<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
class CashFlowSubSector extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;

    public $timestamps = true;
    protected $table = 'cf_subsectors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'sector_id'
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
     * Get the sector that owns the subsector.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector()
    {
        // Asegúrate de que el namespace del modelo relacionado es correcto.
        return $this->belongsTo(CashFlowSector::class, 'sector_id');
    }

    /**
     * Get the cash flows associated with the subsector.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cashFlows()
    {
        // Un subsector puede estar asociado con varios flujos de caja.
        return $this->hasMany(CashFlow::class, 'subsector_id');
    }


    // ...agrega aquí cualquier otro método que necesites...
}
