<?php

namespace App\Imports;

use App\candidate;
use Maatwebsite\Excel\Concerns\ToModel;

class excelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new candidate([
            'full_name' => $row[0],
            'email' => $row[1],
            'contect_number'=> $row[2],
            'gender'=> $row[3],
            'address'=> $row[4],
            'city'=> $row[5],
            'higher_aducation'=> $row[5]
        ]);
    }
}
