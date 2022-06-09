<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $GetFilter = [
        "id",
        "names",
        "lastnames",
        "brithday",
        "address",
        "email",
        "phone",
        "city_id"
    ];
    public function getAll() {
        $students = Student::where("status", 1)->get($this->GetFilter);

        return $students;
    }

    public function getById(int $id) {
        $student = Student::where("id", $id)->get($this->GetFilter);

        return $student;
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

    public function update(Request $request, int $id) {
        $this->validate($request, [
            "names" => ["required"],
            "lastnames" => ["required"],
            "brithday" => ["required"],
            "address" => ["required"],
            "phone" => ["required"],
            "city_id" => ["required"]
        ]);

        $student = Student::where('id', $id)->get($this->GetFilter)->first();

        $student->names = $request->names;
        $student->lastnames = $request->lastnames;
        $student->brithday = $request->brithday;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->city_id = $request->city_id;

        $student->save();

        return response()->json($student);
    }
}
