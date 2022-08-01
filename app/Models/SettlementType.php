<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 /**
 * @OA\Schema(
 *  schema="SettlementType",
 *  title="Settlement Type",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string",
 *      example="Not a real Type"
 * 	)
 * )
 */
class SettlementType extends Model
{
    use HasFactory;

    protected $visible = ['name'];

    public function getNameAttribute(){
        return Str::upper(Str::slug($this->attributes['name'], " "));
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
