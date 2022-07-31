<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



 /**
 * @OA\Schema(
 *  schema="SettlementType",
 *  title="Settlement Type",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer"
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string"
 * 	)
 * )
 */
class SettlementType extends Model
{
    use HasFactory;

    protected $visible = ['name'];

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
