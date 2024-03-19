<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;


//Traits
use App\Traits\AutoGenerateUuid;

class ProductoTag extends Model
{
      //cargamos los trait Uuid,
  use AutoGenerateUuid;
  protected $guarded = [];
  // public $incrementing = false;
  protected $keyType = 'string';


/*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
      return 'uuid';
    } 
/*---------------------------------SCOPES-------------------------------*/

     public function producto(){
    	//un tag pertenece a muchos productos
        return $this->belongsToMany(Producto::class,'producto_producto_tags')
            ->withPivot('producto_tag_id');
    }
}
