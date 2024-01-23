<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Region;
use App\Models\Continent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvincelist()
    {
        $data['provinces'] = Province::all();
        $data['regions'] = Region::all();
        $data['continents'] = Continent::all();

        return response()->json(['data' => $data, 'message' => 'Provinces fetched successfully']);
    }

    public function getProvince(Request $request)
    {
        $data = Province::where('id', $request->id)->first();

        return response()->json($data);
    }

    public function createProvince(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            // Add any other validation rules as needed
        ]);

        try {
            $province = Province::create($request->all());
            return redirect()->back()->with(['success' => 'Province created successfully!']);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['exception' => $exception->getMessage()]);
        }
    }

    public function updateProvince(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'description' => 'required',
            // Add any other validation rules as needed
        ]);

        $province = Province::find($id);
        $province->update($request->all());

        return redirect()->back()->with('success', 'Province updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Province::find($id)->delete();

        return redirect()->back()->with('success', 'Province deleted successfully');
    }
}
