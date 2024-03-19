<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\CashFlow\Entities\CashFlowCategory;
use Modules\CashFlow\Entities\CashFlowSubCategory;
use Modules\CashFlow\Entities\CashFlowSector;
use Modules\CashFlow\Entities\CashFlowSubSector;
use Modules\CashFlow\Entities\CashFlowUnit;
use Modules\CashFlow\Entities\CashFlowUnitCategory;
use Modules\CashFlow\Entities\CashFlowUnitSubCategory;
use Modules\Productos\Entities\Product;
use Modules\ServiceModule\Entities\Service;
use App\Models\Client;

use App\Models\Employee;
use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlow extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = true;
    protected $table = 'cf_cash_flows';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'type',
        'amount',
        'amount_usd',
        'remittance_number',
        'invoice_number',

        'subtotal_number',
        'iva_number',
        'percepcion_number',

        'detail',
        'relation_type',
        'module_type',
        'module_id',
        'sector_id',
        'subsector_id',
        'category_id',
        'subcategory_id',
        'unit_id',
        'unit_category_id',
        'unit_subcategory_id',
        'employee_id',
        'employee_sec1_id',
        'employee_sec2_id',
        'service_id',
        'service_details',
        'client_id',
    ];

    protected $dates = ['date'];


    //Catalgo de cultivos
    const CROPS = [
        1 => 'Trigo',
        2 => 'Soja',
        3 => 'Maíz',
        4 => 'Caña',
        5 => 'Poroto',
        6 => 'Otros',
    ];




    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    //relacion con sector
    public function sector()
    {
        return $this->belongsTo(CashFlowSector::class, 'sector_id');
    }

    // Asumiendo que cada flujo de caja pertenece a un subsector
    public function subsector()
    {
        return $this->belongsTo(CashFlowSubSector::class, 'subsector_id');
    }

    //relacion con categorias
    public function category()
    {
        return $this->belongsTo(CashFlowCategory::class, 'category_id');
    }

    // Asumiendo que cada flujo de caja pertenece a una subcategoría
    public function subcategory()
    {
        return $this->belongsTo(CashFlowSubCategory::class, 'subcategory_id');
    }

    // Asumiendo que cada flujo de caja está relacionado con una unidad específica
    public function unit()
    {
        return $this->belongsTo(CashFlowUnit::class, 'unit_id');
    }
    //relacion con unit category
    public function unitCategory()
    {
        return $this->belongsTo(CashFlowUnitCategory::class, 'unit_category_id');
    }

    //relacion con unit subcategory
    public function unitSubcategory()
    {
        return $this->belongsTo(CashFlowUnitSubCategory::class, 'unit_subcategory_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // Mutador para la propiedad 'date'
    public function setDateAttribute($value)
    {
        if ($value) {
            $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        }
    }

    // Accesor para la propiedad 'date'
    public function getDateAttribute($value)
    {

        if ($value) {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }

    public function module()
    {
        return $this->morphTo(__FUNCTION__, 'module_type', 'module_id');
    }

    //relacion con employee employee_id
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    //employee_sec1_id
    public function employeeSec1()
    {
        return $this->belongsTo(Employee::class, 'employee_sec1_id');
    }

    //employee_sec2_id
    public function employeeSec2()
    {
        return $this->belongsTo(Employee::class, 'employee_sec2_id');
    }

    //relacion con service
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function setOperatorHoursAttribute($value)
    {
        $this->attributes['operator_hours'] = $value;
    }

    public function setHelper1HoursAttribute($value)
    {
        $this->attributes['helper1_hours'] = $value;
    }

    public function setHelper2HoursAttribute($value)
    {
        $this->attributes['helper2_hours'] = $value;
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    //details
    public function details()
    {
        return $this->hasMany(CashFlowDetail::class, 'cash_flow_id', 'id');
    }

    /*
    *-------------- Accessors and Mutators-----------------
    */

    public function getUnitCategoryUnitSubcategoryNameAttribute()
    {
        $categoryName = $this->unitCategory ? $this->unitCategory->name : 'N/A';
        $subcategoryName = $this->unitSubcategory ? $this->unitSubcategory->name : 'N/A';

        return $categoryName . ' - ' . $subcategoryName;
    }



    //y en los otros modelos colocar
    // public function cashFlows()
    // {
    //     return $this->morphMany(CashFlow::class, 'module');
    // }
}
