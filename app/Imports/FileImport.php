<?php

namespace App\Imports;

use App\Models\FederalEntity;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FileImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport(),
            new FederalEntitiesImport()
        ];
    }
}
