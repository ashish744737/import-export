<?php

namespace App\Exports;

use DB;
use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = DB::table('students')->select('name','roll_no',DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y")'))->get();
        return $students;
    }
    public function headings(): array
    {
        return [
            'Roll No',
            'Name',
            'Created At',
        ];
    }
}
