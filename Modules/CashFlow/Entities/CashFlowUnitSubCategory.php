<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlowUnitSubCategory extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = true;
    protected $table = 'cf_unit_subcategories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
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

    public function cashflow()
    {
        return $this->hasMany(CashFlow::class, 'unit_subcategory_id');
    }
}
