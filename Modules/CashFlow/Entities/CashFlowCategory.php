<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;


use Modules\CashFlow\Entities\CashFlowSubCategory;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
class CashFlowCategory extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cf_categories';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
      return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    public function subcategories()
    {
        return $this->hasMany(CashFlowSubCategory::class, 'category_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(CashFlowUnit::class, 'category_id', 'id');
    }

    //relacion con cashflow
    public function cashflow()
    {
        return $this->hasMany(CashFlow::class, 'category_id', 'id');
    }
    // ...agrega aquí cualquier otro método que necesites...
}
