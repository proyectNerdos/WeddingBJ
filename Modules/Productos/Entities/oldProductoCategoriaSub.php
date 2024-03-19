<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;

//Traits
use App\Traits\AutoGenerateUuid;


use Modules\Productos\Entities\ProductoCategoria;


class ProductoCategoriaSub extends Model
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

    public function categoria()
    {
        //un sub-categoria puede tener una categoria
        return $this->belongsTo(ProductoCategoria::class,'producto_categoria_id');
    }

     public function producto()
    {
        //una sub-categoria puede tener muchas productos
       return $this->hasMany(Producto::class);
    }



}
