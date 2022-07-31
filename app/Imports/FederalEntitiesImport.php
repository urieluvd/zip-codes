<?php

namespace App\Imports;

use App\Models\FederalEntity;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FederalEntitiesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            FederalEntity::create([
                'name' => $row['d_estado'],
                'code' => $row['c_estado']
            ]);
        }
    }
}
