<?php

namespace App\Imports;

use DB;
use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
       
        foreach ($rows as $key=>$row) 
        {
            // skip headers
            if($key == 0){
                continue;
            }
            // skip empty values
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
