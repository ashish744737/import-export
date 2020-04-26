<?php

namespace App\Imports;

use App\Student;

// use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Student([
    //         //
    //     ]);
    // }
    public function collection(Collection $rows)
    {
       
        foreach ($rows as $key=>$row) 
        {
            // skip headers while importing data
            if($key == 0){
                continue;
            }
            // skip blank roll number or name
            if($row[0] == null || $row[1] == null){
                continue;
                
            }
            Student::create([
                'roll_no' => @$row[0],
                'name' => @$row[1]
            ]);
        }
    }
}
