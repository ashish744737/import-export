<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class ImportController extends Controller
{
    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
    public function import(Request $request)
    {
        $validator = $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls,odt|max:50000'
        ]);
        $excel =  Excel::import(new StudentsImport,request()->file('file'));
        return back()->with('success','You Have successfully imported data.');
    }
    public function exportCSV()
    {
    return Excel::download(new StudentsExport, 'student.csv');
    }
    public function truncate_students(){
        Student::query()->truncate();
        return back()->with('success','You Have successfully imported data.');
    }
}
