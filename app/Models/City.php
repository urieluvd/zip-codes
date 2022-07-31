<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


 /**
 * @OA\Schema(
 *  schema="City",
 *  title="City",
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
 * 		property="municipality_id",
 * 		type="string"
 * 	)
 * )
 */
class City extends Model
{
    use HasFactory;

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
