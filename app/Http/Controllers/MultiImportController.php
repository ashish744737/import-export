<?php

namespace App\Http\Controllers;


use App\Student;
use App\Product;
use Illuminate\Http\Request;
use App\Imports\MultImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class MultiImportController extends Controller
{
    public function index(){
        return view('multi_import');
    }
    public function multi_import(Request $request)
    {
        $validator = $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls,odt|max:50000'
        ]);
        $excel =  Excel::import(new MultImport,request()->file('file'));
        return back()->with('success','You Have successfully imported data.');
    }
    public function truncate_products(){
        Product::query()->truncate();
        return back()->with('success','You Have successfully imported data.');
    }
}
