<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Productos\Entities\Producto;


//Traits
use App\Traits\AutoGenerateUuid;

class ProductoImagen extends Model
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
      //una imagen corresponde a un producto
        return $this->belongsTo(Producto::class);
    }




}
