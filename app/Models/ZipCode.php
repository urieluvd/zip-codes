<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
 /**
 * @OA\Schema(
 *  schema="ZipCode",
 *  title="ZipCode",
 * 	@OA\Property(
 * 		property="id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="code",
 * 		type="string",
 *      example="00000"
 * 	)
 * )
 */
class ZipCode extends Model
{
    use HasFactory;



    protected $appends = ['zip_code','locality','federal_entity', 'municipality'];

    protected $visible = ['zip_code', 'locality', 'federal_entity', 'settlements', 'municipality'];

    public function getZipCodeAttribute(){
        return $this->attributes['code'];
    }

    public function settlements()
    {
        return $this->belongsToMany(Settlement::class, 'settlement_zip_code');
    }

    public function getLocalityAttribute(){
        $settlement = $this->settlements()->first();
        $settlement->load('city');
        return $settlement->city->name;
    }

    public function getfederalEntityAttribute(){

        $settlement = $this->settlements()->first();
        $settlement->load('city');

        $city = $settlement->city;
        $city->load('municipality');

        $federalEntity = FederalEntity::whereHas('municipalities', function (Builder $query) use($city){
            $query->where('id', $city->municipality_id);
        })->first();

        return $federalEntity;
    }

    public function getMunicipalityAttribute(){

        $settlement = $this->settlements()->first();
        $settlement->load('city');

        $city = $settlement->city;
        $city->load('municipality');

        return $city->municipality;
    }
}
