<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    public function getAll() {
        $states = City::where("status", 1)->get(["id", "name"]);

        return $states;
    }

    public function getById(int $id) {
        $state = City::where('id', $id)->get(["id", "name"])->first();

        return $state;
    }

    public function created(CityRequest $request) {
        $request->validated();

        $state = new City([
            "name" => $request->name,
            "state_id" => $request->state_id,
            "status" => 1
        ]);
        $state->save();

        return response()->json($state);
    }

    public function update(CityRequest $request, int $id) {
        $request->validated();

        $state = City::where('id', $id)->get(["id", "name"])->first();

        $state->name = $request->name;
        $state->save();

        return response()->json($state);
    }
}
