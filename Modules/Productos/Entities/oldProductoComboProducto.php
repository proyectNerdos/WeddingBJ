<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;

//Traits
use App\Traits\AutoGenerateUuid;

class ProductoComboProducto extends Model
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


	public function producto()
    {
      //una producto corresponde a un combo
        return $this->belongsTo(Producto::class,'producto_id');
    }




   

}
