<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContinentController extends Controller
{
    public function getContinentList()
    {
        $continents = Continent::all();
        return response()->json(['data' => $continents]);
    }

    public function getContinent(Request $request)
    {
        $data = Continent::find($request->id);

        if (!$data) {
            return response()->json(['error' => 'Continent not found'], 404);
        }

        return response()->json(['data' => $data]);
    }

    public function createContinent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|unique:continents,description',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 500);
        }

        try {
            $continent = Continent::create($request->all());
            return response()->json(['data' => $continent, 'message' => 'continent created succesfully'], 201);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function updateContinent(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [
            'id' => 'required',
            'description' => 'required',
            //tyt
        ]);

        try {
            $continent = Continent::findOrFail($id);
            $continent->update($request->all());
            return response()->json(['data' => $continent]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $continent = Continent::find($id);

        if (!$continent) {
            return response()->json(['error' => 'Continent not found'], 404);
        }

        $continent->delete();

        return response()->json(['message' => 'Continent deleted successfully']);
    }
}
