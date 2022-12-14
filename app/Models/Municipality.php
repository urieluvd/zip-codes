<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 /**
 * @OA\Schema(
 *  schema="Municipality",
 *  title="Municipality",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string",
 *      example="Not a real Municiaplity"
 * 	),
 * 	@OA\Property(
 * 		property="code",
 * 		type="string",
 *      example="00"
 * 	),
 * 	@OA\Property(
 * 		property="federal_entity_id",
 * 		type="integer",
 *      example=1
 * 	)
 * )
 */
class Municipality extends Model
{
    use HasFactory;

    protected $visible = ['key', 'name'];
    protected $appends = ['key'];

    public function getKeyAttribute(){

        return intval($this->attributes['code']);
    }

    public function getNameAttribute(){
        return Str::upper(Str::slug($this->attributes['name'], " "));
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function federalEntity()
    {
        return $this->belongsTo(FederalEntity::class);
    }
}
