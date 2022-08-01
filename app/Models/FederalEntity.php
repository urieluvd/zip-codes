<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

 /**
 * @OA\Schema(
 *  schema="FederalEntity",
 *  title="Federeal Entity",
 *  @OA\Property(
 * 		property="id",
 * 		type="integer",
 *      example=1
 * 	),
 * 	@OA\Property(
 * 		property="name",
 * 		type="string",
 *      example="Not a real Federal Entity"
 * 	),
 * 	@OA\Property(
 * 		property="code",
 * 		type="string",
 *      example="00"
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

    public function getNameAttribute(){
        return Str::upper(Str::slug($this->attributes['name'], " "));
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
