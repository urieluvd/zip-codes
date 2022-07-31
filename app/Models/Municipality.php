<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


 /**
 * @OA\Schema(
 *  schema="Municipality",
 *  title="Municipality",
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
 * 		property="federal_entity_id",
 * 		type="string"
 * 	)
 * )
 */
class Municipality extends Model
{
    use HasFactory;

    protected $visible = ['key', 'name'];
    protected $appends = ['key'];

    public function getKeyAttribute(){
        return $this->attributes['id'];
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