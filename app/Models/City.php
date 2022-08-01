<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 /**
 * @OA\Schema(
 *  schema="City",
 *  title="City",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string",
 *      example="Not a real City"
 * 	),
 * 	@OA\Property(
 * 		property="code",
 * 		type="string",
 *      example="00"
 * 	),
 * 	@OA\Property(
 * 		property="municipality_id",
 * 		type="int",
 *      example=1
 * 	)
 * )
 */
class City extends Model
{
    use HasFactory;

    public function getNameAttribute(){
        return Str::upper(Str::slug($this->attributes['name'], " "));
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
