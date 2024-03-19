<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;

//Traits
use App\Traits\AutoGenerateUuid;

class ProductoOferta extends Model
{
    //cargamos los trait Uuid,
  use AutoGenerateUuid;
  protected $guarded = [];
  protected $dates = ['fecha_inicio','fecha_fin'];
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
      //una oferta corresponde a un producto
      return $this->belongsTo(Producto::class);
    }


}
