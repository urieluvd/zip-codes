<?php

namespace App\Imports;

use App\Models\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;

class MunicipalitiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Municipality([
            //
        ]);
    }
}
