<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function getAll() {
        $studens = Student::where("status", 1)->get();

        return $studens;
    }

    public function getById(int $id) {
        $studen = Student::where("id", $id)->get();

        return $studen;
    }

    public function created(StudentRequest $request) {
        $request->validated();

        $student = new Student([
            "names" => $request->names,
            "lastnames" => $request->lastnames,
            "brithday" => $request->brithday,
            "address" => $request->address,
            "email" => $request->email,
            "phone" => $request->phone,
            "status" => 1,
            "city_id" => $request->city_id
        ]);

        $student->save();

        return response()->json($student);
    }
}
