<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlowUnit extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    public $timestamps = true;
    protected $table = 'cf_units';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'unit_type',
        'attributes',
        'category_id'
    ];

    protected $dates = [];
    protected $casts = [];


    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/



    public function cashFlows()
    {
        return $this->hasMany(CashFlow::class, 'unit_id');
    }


    public function unitDetails()
    {
        return $this->hasMany(CashFlowUnitDetail::class, 'unit_id');
    }

    public function category()
    {
        return $this->belongsTo(CashFlowUnitCategory::class, 'category_id');
    }

}
