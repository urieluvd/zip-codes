<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


 /**
 * @OA\Schema(
 *  schema="FederalEntity",
 *  title="Federeal Entity",
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
 * 	)
 * )
 */
class FederalEntity extends Model
{
    use HasFactory;

    protected $appends = ['key'];

    protected $visible = ['key', 'name', 'code'];

    public function getKeyAttribute(){
        return $this->attributes['id'];
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
