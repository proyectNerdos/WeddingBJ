<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;

//model
use Modules\Compras\Entities\Compra;
use Modules\Compras\Entities\CompraGarantia;
use Modules\Productos\Entities\Producto;


//Traits
use App\Traits\AutoGenerateUuid;

class ProductoProvedores extends Model
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


    public function compra()
    {
        //un provedor puede tener muchas Compras
       return $this->hasMany(Compra::class,'producto_provedore_id');
    } 

    public function compraGarantia()
    {
        //un provedor puede tener muchas Compras garantias
       return $this->belongsTo(CompraGarantia::class,'producto_provedore_id');
    }    

    public function producto()
    {
        //un provedor puede tener muchos Productos
       return $this->hasMany(Producto::class,'producto_provedore_id');
    }  







    //SOBRE TODOS LO METODOS ANTERIORES
    public function IntegridadRefencial($query)
    {

      //si hay compras relacionadas - SET NULL
      if ($query->compra->first() != null) {
            foreach ($query->compra as $key => $compra) {
                $compra->producto_provedore_id = null;
                $compra->save();
            }
        }
      
      //si hay Productos relacionadas - SET NULL
      if ($query->producto->first() != null) {
            foreach ($query->producto as $key => $producto) {
                $producto->producto_provedore_id = null;
                $producto->save();
            }
        }

      
    }//end IntegridadRefencial









}
