<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Http\Requests\StateRequest;

class StateController extends Controller
{
    public function getAll() {
        $states = State::where("status", 1)->get(["id", "name"]);

        return $states;
    }

    public function getById(int $id) {
        $state = State::where('id', $id)->get(["id", "name"])->first();

        return $state;
    }

    public function created(StateRequest $request) {
        $request->validated();

        $state = new State([
            "name" => $request->name,
            "status" => 1
        ]);
        $state->save();

        return response()->json($state);
    }

    public function update(StateRequest $request, int $id) {
        $request->validated();

        $state = State::where('id', $id)->get(["id", "name"])->first();

        $state->name = $request->name;
        $state->save();

        return response()->json($state);
    }
}
