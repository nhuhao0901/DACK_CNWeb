<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBrand implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Brand([
            //
        ]);
    }
}
