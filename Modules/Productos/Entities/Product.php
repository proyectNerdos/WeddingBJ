<?php

namespace Modules\Productos\Entities;

use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Model;

use Modules\Productos\Entities\ProductTax;
use Modules\Productos\Entities\ProductBrand;
use Modules\Productos\Entities\ProductCombo;
use Modules\Productos\Entities\ProductImage;
use Modules\Productos\Entities\ProductOffer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Productos\Entities\ProductReview;
use Modules\Productos\Entities\ProductCategory;
use Modules\Productos\Entities\ProductSupplier;
use Modules\Productos\Entities\ProductProductTag;
use Modules\Productos\Entities\ProductCategorySub;
use Modules\Productos\Entities\ProductComboProduct;
use Modules\Productos\Entities\ProductUnitsOfMeasure;

class Product extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'code',
        'description',
        'slug',

        // precios USD
        'cost_price_usd_ex_tax',//sin impuestos
        'cost_price_usd_in_tax',//con impuestos
        'sale_price_usd_ex_tax',//sin impuestos
        'sale_price_usd_in_tax',//con impuestos
        'crossed_out_price_usd',//precio tachado

        // precios Pesos
        'cost_price_pesos_ex_tax',//sin impuestos
        'cost_price_pesos_in_tax',//con impuestos
        'sale_price_pesos_ex_tax',//sin impuestos
        'sale_price_pesos_in_tax',//con impuestos
        'crossed_out_price_pesos',//precio tachado

        'profitability',
        'warranty',
        'tax_id',
        'tax',
        'points',
        'discount',
        'price2',
        'profitability2',
        'price3',
        'profitability3',

        // stock
        'base_unit_stock',
        'stock',
        'stock_per_base_unit',
        'unit_of_measure_id',
        'total_stock',
        'critical_stock',
        'ordered_stock',

        //relaciones
        'category_id',
        'sub_category_id',
        'brand_id',
        'supplier_id',
        'product_combo_id',

        'alternate_code',
        'location',
        'bulk_code',
        'bulk_quantity',
        'alert',
        'observations',
        'use_profitability',
        'short_description',
        'long_description',
        'image',
        'filename',
        'thumbnail',
        'thumbnail_filename',
        'enabled',
        'enabled_add_to_cart',

        'offer',
        'hot',
        'rating_count',
        'rating_cache',
        'sort_order',
        'is_predefined',
    ];
    protected $dates = [];
    protected $casts = [];



    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    public function Brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id', 'id');
    }



    public function Category()
    {
        return $this->belongsTo(ProductCategory::class ,'category_id','id');
    }

    public function Combo()
    {
        return $this->belongsTo(ProductCombo::class,'product_combo_id');
    }

    public function CategorySub()
    {
        return $this->belongsTo(ProductCategorySub::class,'sub_category_id','id');
    }

    public function Supplier()
    {
        return $this->belongsTo(ProductSupplier::class,'supplier_id','id');
    }

    public function UnitsOfMeasure()
    {
        return $this->belongsTo(ProductUnitsOfMeasure::class,'unit_of_measure_id','id');
    }

    public function Tax()
    {
        return $this->belongsTo(ProductTax::class,'tax_id','id');
    }

    public function ComboProduct()
    {
        return $this->hasOne(ProductComboProduct::class,'product_id','id');
    }

    public function Image()
    {
        return $this->hasOne(ProductImage::class,'product_id','id');
    }

    public function Offer()
    {
        return $this->hasOne(ProductOffer::class,'product_id','id');
    }

    public function ProductTag()
    {
        return $this->hasOne(ProductProductTag::class,'product_id','id');
    }

    public function Review()
    {
        return $this->hasOne(ProductReview::class,'product_id','id');
    }


    public function getCreatedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);

        if ($date instanceof \DateTime) {
            return $date->format('j/n/Y g:i A');
        }

        return null;
    }

    public function getDeletedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);

        if ($date instanceof \DateTime) {
            return $date->format('j/n/Y g:i A');
        }

        // Puedes decidir qué hacer si la fecha no se pudo parsear.
        // Por ejemplo, puedes devolver null, devolver la fecha original sin formato, lanzar una excepción, etc.
        return null;
    }

    public function getUpdatedAtAttribute($value)
    {
        $date = \DateTime::createFromFormat($this->getDateFormat(), $value);

        if ($date instanceof \DateTime) {
            return $date->format('j/n/Y g:i A');
        }
        return null;
    }

    /*
    *-------------- Accessors and Mutators-----------------
    */


}
