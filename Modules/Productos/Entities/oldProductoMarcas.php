<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;


//Traits
use App\Traits\AutoGenerateUuid;


class ProductoMarcas extends Model
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


    //hacemos una consulta query atraves del metodo 
//scopeName se va a ir alterando mi usu_nombre  atraves del para
//metro que le pasamos por $name
    public function scopeSearch($query,$name)
    {
        //buscamos en la column a usu_nombre de la forma like
        return $query->where('descripcion',"like", "%" . $name . "%");


    }


    public function producto()
    {
      //una marca corresponde a muchos productos
        return $this->hasMany(Producto::class,'producto_marca_id');
    }



    //SOBRE TODOS LO METODOS ANTERIORES
    public function IntegridadRefencial($query)
    {

      
      //si hay compras relacionadas - SET NULL
      if ($query->producto->first() != null) {
            foreach ($query->producto as $key => $producto) {
                $producto->producto_marca_id = null;
                $producto->save();
            }
        }
    
    }//end IntegridadRefencial


}
