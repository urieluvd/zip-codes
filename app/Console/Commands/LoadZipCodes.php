<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Imports\FederalEntitiesImport;
use App\Imports\FileImport;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\City;
use App\Models\Code;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Exception;

class LoadZipCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zipcodes:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(__DIR__."/../../../storage/CPdescarga.xls");

        $sheetCount = $spreadsheet->getSheetCount();
        for ($i = 20; $i < $sheetCount; $i++) {
            $sheet = $spreadsheet->getSheet($i);
            var_dump($sheet->getTitle());

            $row = 2;


            /*
            $totalRows = $sheet->toArray();
            $totalRows = sizeof($totalRows);

            */
            $totalRows = $sheet->getHighestDataRow();
            echo "Inserting Data".PHP_EOL;
            echo "total rows ".$totalRows.PHP_EOL;

            $firstRow = true;

            $cellValues = $sheet->rangeToArray('A2'.':O2');

            $federalEntityName = $cellValues[0][4];
            $federalEntityCode = $cellValues[0][7];

            $federalEntity = FederalEntity::where('code', $federalEntityCode)->first();

            if ($federalEntity == null) {

                $federalEntity = new FederalEntity();
                $federalEntity->name = $federalEntityName;
                $federalEntity->code = $federalEntityCode;
                $federalEntity->save();

            }

            for($j=$row; $j < $totalRows; $j++) {

                $cellValues = $sheet->rangeToArray('A'.$j.':O'.$j);

                if($cellValues[0][0] == null || $cellValues[0][0] == ""){
                    var_dump("real rows ".$j);
                    break(1);
                }

                try {
                    // START row
                    $municipalityName = $cellValues[0][3];
                    $municipalityCode = $cellValues[0][11];

                    if($municipalityName == "" || $municipalityName == null){
                        $municipalityName = $federalEntity->name;
                    }

                    $municipality = Municipality::where([
                        'name' => $municipalityName,
                        'federal_entity_id' => $federalEntity->id
                        ])->first();

                    if ($municipality == null) {

                        $municipality = new Municipality();

                        $municipality->name = $municipalityName;
                        $municipality->code = $municipalityCode;
                        $municipality->federal_entity_id = $federalEntity->id;
                        $municipality->save();

                    }

                    $cityName = $cellValues[0][5];
                    $cityCode = $cellValues[0][14];

                    if($cityName == "" || $cityName == null){
                        $cityName = $municipality->name;
                    }

                    $city = City::where([
                        'name' => $cityName,
                        'municipality_id' => $municipality->id
                        ])->first();


                    if($city == null){

                        $city = new City();

                        $city->code = $cityCode;
                        $city->municipality_id = $municipality->id;

                        $city->name = $cityName;
                        $city->save();
                    }

                    $settlementTypeName = $cellValues[0][2];

                    if($settlementTypeName == "" || $settlementTypeName == null){
                        $settlementTypeName = "Indefinido";
                    }

                    $settlementType = SettlementType::where([
                        'name' => $settlementTypeName
                        ])->first();

                    if($settlementType == null){

                        $settlementType = new SettlementType();

                        $settlementType->name = $settlementTypeName;

                        $settlementType->save();
                    }


                    $settlementName = $cellValues[0][1];
                    $settlementCode = $cellValues[0][12];
                    $settlementZone = $cellValues[0][13];

                    if($settlementName == "" || $settlementName == null){
                        $settlementName = $city->name;
                    }

                    if($settlementTypeName == "" || $settlementTypeName == null){
                        $settlementTypeName = "Indefinido";
                    }

                    $settlement = Settlement::where([
                        'code' => $settlementCode,
                        'city_id'=> $city->id
                        ])->first();

                    if($settlement == null){

                        $settlement = new Settlement();
                        $settlement->city_id = $city->id;
                        $settlement->name = $settlementName;
                        $settlement->code = $settlementCode;
                        $settlement->settlement_type_id = $settlementType->id;
                        $settlement->zone_type = $settlementZone;
                        $settlement->save();

                    }

                    $code = $cellValues[0][0];

                    $zipCode = ZipCode ::where(['code' => $code])->first();

                    if($zipCode == null){
                        $zipCode = new ZipCode();
                        $zipCode->code = $code;
                        $zipCode->save();
                    }

                    $settlement->zipCodes()->sync([$zipCode->id]);

                } catch (Exception $e) {
                    Log::info("ZipCodes: file", ["error" => $e->getMessage(), "trace" => $e->getTrace()]);
                }
            }
        }

        return 0;
    }
}
