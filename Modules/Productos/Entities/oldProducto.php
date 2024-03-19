<?php

namespace Modules\Productos\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use DB;
use Storage;

use Modules\Productos\Entities\ProductoImagen;
use Modules\Productos\Entities\ProductoCategoria;
use Modules\Productos\Entities\ProductoCategoriaSub;
use Modules\Productos\Entities\ProductoProvedores;

use app\User;

//Traits
use App\Traits\AutoGenerateUuid;


class Producto extends Model
{

  //cargamos los trait Uuid,
  use AutoGenerateUuid;
	protected $guarded = [];
  public $incrementing = false;
  protected $keyType = 'string';
     	

    //scopes
    public function getRouteKeyName()
    {
      return 'uuid';
    } 

   
    public function setPathAttribute($path){
      $this->attributes['path']  = Carbon::now()->second.$path->getClientOriginalName();
      $name = Carbon::now()->second.$path->getClientOriginalName();
      \Storage::disk('local')->put($name, \File::get($path));
    }





    public function combos(){
      //una producto puede tener varias combos
        return $this->hasMany(ProductoComboProducto::class,'producto_combos_id');
    }


    public function oferta()
    {
      //una producto tiene una oferta
      return $this->belongsTo(ProductoOferta::class,'producto_oferta_id');
    }


    public function proveedor()
    {
        //un post puede tener una categoria
        return $this->belongsTo(ProductoProvedores::class,'producto_provedore_id');
    }

    public function marca()
    {
      //una producto corresponde a una marca
        return $this->belongsTo(ProductoMarcas::class,'producto_marca_id');
    }

    public function producto_image()
    {
      //una producto puede tener varias imagenes
        return $this->hasMany(ProductoImagen::class);
    }

    public function categoria()
    {
      //una producto corresponde a una categoria //producto_categoria_id es la clave foranea en producto
        return $this->belongsTo(ProductoCategoria::class,'producto_categoria_id');
    }

    public function categoriasub()
    {
      //una producto corresponde a una categoriasub
        return $this->belongsTo(ProductoCategoriaSub::class,'producto_categoria_sub_id');
    }

    public function reviews()
  { 
      //una producto puede tener varias Reviews
      return $this->hasMany(ProductoReviews::class);
  }

  public function recalculateRating($rating)
    {
      $reviews = $this->reviews()->notSpam()->approved();
      
      $avgRating = $reviews->avg('rating');
      $this->rating_cache = round($avgRating,1);
      $this->rating_count = $reviews->count();
      $this->save();
    }



      public function tags(){
        //un producto tiene muchos tags
        return $this->belongsToMany(ProductoTag::class,'producto_producto_tags')
            ->withPivot('producto_id');
    }


    public function deseos(){
        //un producto esta relacionado a muchso usuarios
        return $this->belongsToMany(User::class,'user_deseos')
            ->withPivot('user_id');
    }

    



/*=================================MIS FUNCIONES=============================*/
     public function ComboCalcularTotalConDescuento($ProductoCombo)
  { 
    
      $TotalConDescuento = 0;
      foreach ($ProductoCombo->combos as $key => $combo) {
        $cantidad = $combo->cantidad;
        $descuento = $combo->descuento;
        $TotalConDescuento += ($combo->producto->precio_venta_pesos_c_iva*$cantidad)-(($combo->producto->precio_venta_pesos_c_iva*$cantidad)*($descuento/100)) ;
      }
       return $TotalConDescuento;
  }
/*=================================MIS FUNCIONES=============================*/





/*=================================Calcular stock del combo=============================*/
  public function CalcularStockCombo($ProductoCombo)
  {
    foreach ($ProductoCombo->combos as $key => $itemCombo) {
           if ($itemCombo->producto->stockactual >= $itemCombo->cantidad) {
            $stock =1;
           }else{
            $stock =0;
            break;
           }

    }
    return $stock;
  }
/*=================================Calcular stock del combo=============================*/


}
