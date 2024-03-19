<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
class CashFlowUnitCategory extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    public $timestamps = true;
    protected $table = 'cf_unit_category';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
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


    public function unitDetails()
    {
        return $this->hasMany(CashFlowUnitDetail::class, 'detail_category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(CashFlowUnitSubCategory::class, 'unit_category_id');
    }


    public function units()
    {
        return $this->hasMany(CashFlowUnit::class, 'category_id');
    }

    public function cashflow()
    {
        return $this->hasMany(CashFlow::class, 'unit_category_id');
    }

    /*
     *-------------- Accessors and Mutators-----------------
     */



}
