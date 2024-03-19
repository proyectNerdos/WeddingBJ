<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;
//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlowUnitDetail extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = false;
    protected $table = 'cf_unit_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'unit_id',
        'detail_category_id',
        'description',
        'cost',
    ];

    protected $dates = [];
    protected $casts = [];


    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
      return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    /**
     * Get the unit that owns the unit detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        // Asegúrate de que el namespace del modelo relacionado es correcto.
        return $this->belongsTo(CashFlowUnit::class, 'unit_id');
    }

    /**
     * Get the category that owns the unit detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitCategory()
    {
        // Asegúrate de que el namespace del modelo relacionado es correcto.
        return $this->belongsTo(CashFlowUnitCategory::class, 'detail_category_id');
    }

    // ...agrega aquí cualquier otro método que necesites...
}
