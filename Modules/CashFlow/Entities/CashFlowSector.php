<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
class CashFlowSector extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    public $timestamps = true;
    protected $table = 'cf_sectors';
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

    /**
     * Get the subsectors for this sector.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subsectors()
    {
        return $this->hasMany(CashFlowSubSector::class, 'sector_id', 'id');
    }

    //relation con cashflow
    public function cashflow()
    {
        return $this->hasMany(CashFlow::class, 'sector_id', 'id');
    }

    // ...agrega aquí cualquier otro método que necesites...
}
