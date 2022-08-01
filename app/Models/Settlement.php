<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 /**
 * @OA\Schema(
 *  schema="Settlement",
 *  title="Settlement",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string",
 *      example="Not a real Settlement"
 * 	),
 * 	@OA\Property(
 * 		property="code",
 * 		type="string",
 *      example="00"
 * 	),
 * 	@OA\Property(
 * 		property="zone_type",
 * 		type="string",
 *      example="Type"
 * 	),
 * 	@OA\Property(
 * 		property="settlement_type_id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="municipality_id",
 * 		type="integer",
 *      example=1
 * 	)
 * )
 */
class Settlement extends Model
{
    use HasFactory;

    protected $visible = ['key', 'name', 'zone_type', 'settlementType'];

    protected $appends = ['key'];

    public function getKeyAttribute(){
        return intval($this->attributes['code']);
    }

    public function getNameAttribute(){
        return Str::upper(Str::slug($this->attributes['name'], " "));
    }

    public function getZoneTypeAttribute(){
        return Str::upper(Str::slug($this->attributes['zone_type'], " "));
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function zipCodes()
    {
        return $this->belongsToMany(ZipCode::class, 'settlement_zip_code');
    }

    public function settlementType()
    {
        return $this->belongsTo(SettlementType::class);
    }
}
