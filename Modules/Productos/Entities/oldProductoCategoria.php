<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;

//Traits
use App\Traits\AutoGenerateUuid;

use Modules\Productos\Entities\ProductoCategoriaSub;
use Modules\Productos\Entities\Producto;

class ProductoCategoria extends Model
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

    public function categoriasub()
    {
        //una categoria puede tener muchas sub-categorias
       return $this->hasMany(ProductoCategoriaSub::class);
    }


    public function producto()
    {
        //una categoria puede tener muchas productos
       return $this->hasMany(Producto::class);

    }


}
