<?php

namespace App\Imports;

use App\Models\Settlement;
use Maatwebsite\Excel\Concerns\ToModel;

class SettlementsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Settlement([
            //
        ]);
    }
}
