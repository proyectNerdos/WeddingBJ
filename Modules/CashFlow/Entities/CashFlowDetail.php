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
use Modules\Productos\Entities\ProductUnitsOfMeasure;
use App\Models\User;
use Modules\ServiceModule\Entities\Service;
use App\Models\Employee;
use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlowDetail extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = true;
    protected $table = 'cf_cash_flow_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'cash_flow_id',
        'product_id',
        'service_id',
        'user_id',
        'user_name',
        'product_quantity',
        'measurement_unit_id',
        'consumed_quantity',
        'consumed_measurement_unit_id',
        'cost_price_pesos_ex_tax',
        'cost_price_pesos_in_tax',
        'sale_price_pesos_ex_tax',
        'sale_price_pesos_in_tax',
        'quantity',
        'discount',
        'net_discount',
        'net_tax',
        'subtotal',
        'subtotal_with_tax',
        'total'
    ];

    protected $dates = ['date'];

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cashflow()
    {
        return $this->belongsTo(CashFlow::class, 'cash_flow_id');
    }

    public function measurementUnit()
    {
        return $this->belongsTo(ProductUnitsOfMeasure::class, 'measurement_unit_id');
    }

    public function consumedMeasurementUnit()
    {
        return $this->belongsTo(ProductUnitsOfMeasure::class, 'consumed_measurement_unit_id');
    }



}
