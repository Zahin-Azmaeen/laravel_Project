<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Dropdown;
use App\Models\Dropdown2;
use App\Models\Dropdown3;
use App\Models\Thana;
use App\Models\category;

class DropdownController extends Controller
{
    public function index()
    {
        $divisions = Dropdown::all();

        return view('dropdown', compact('divisions'));
    }
    public function fetchState(Request $request)
    {
        $district = Dropdown2::where("division_id", $request->division_id)
            ->get(["district_name", "district_id"]);

        return response()->json($district);
    }
    public function fetchThana(Request $request)
    {
        $thana = Dropdown3::where("district_id", $request->district_id)
            ->get(["thana_name", "thana_id"]);

        return response()->json($thana);
    }
    public function storeData(Request $request)
    {

        $input = new Thana;
        $input->division_id = $request->division;
        $input->district_id = $request->district;
        $input->thana = $request->thana;
        $input->save();
    }
    public function categoryList()
    {
        $category = category::all();

        return view('catagory', compact('category'));
    }
    public function dd()
    {
        $category = category::all();
        return view('dynamictable', compact('category'));
    }
}
