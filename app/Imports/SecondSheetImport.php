<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
Use App\Product;

class SecondSheetImport implements ToCollection
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
            if($row[0] == null){
                continue;
            }
            Product::create([
                'name' => @$row[0],
            ]);
        }
    }
}
