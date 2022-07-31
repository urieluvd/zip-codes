<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


 /**
 * @OA\Schema(
 *  schema="Settlement",
 *  title="Settlement",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer"
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string"
 * 	),
 * 	@OA\Property(
 * 		property="code",
 * 		type="string"
 * 	),
 * 	@OA\Property(
 * 		property="zone_type",
 * 		type="string"
 * 	),
 * 	@OA\Property(
 * 		property="settlement_type_id",
 * 		type="string"
 * 	),
 * 	@OA\Property(
 * 		property="municipality_id",
 * 		type="string"
 * 	)
 * )
 */
class Settlement extends Model
{
    use HasFactory;

    protected $visible = ['key', 'name', 'zone_type', 'settlementType'];

    protected $appends = ['key'];

    public function getKeyAttribute(){
        return $this->attributes['id'];
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
