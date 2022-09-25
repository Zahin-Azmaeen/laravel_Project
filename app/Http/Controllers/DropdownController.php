<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Dropdown;
use App\Models\Dropdown2;
use App\Models\Thana;

class DropdownController extends Controller
{
    public function index()
    {
        $divisions = Dropdown::all();

        return view('dropdown', compact('divisions'));
    }
    public function fetchState(Request $request)
    {
        $data['district'] = Dropdown2::where("division_id", $request->division_id)
            ->get(["district_name", "district_id"]);

        return response()->json($data);
    }
    public function storeData(Request $request)
    {

        $input = new Thana;
        $input->division_id = $request->division;
        $input->district_id = $request->district;
        $input->thana = $request->thana;
        $input->save();
    }
}
