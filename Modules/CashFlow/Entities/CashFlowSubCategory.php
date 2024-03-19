<?php

namespace Modules\CashFlow\Entities;

use Illuminate\Database\Eloquent\Model;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashFlowSubCategory extends Model
{
    use SoftDeletes;
    use AutoGenerateUuid;

    public $timestamps = true;
    protected $table = 'cf_subcategories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
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

    /**
     * Get the category that owns the subcategory.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        // Asegúrate de que el namespace del modelo relacionado es correcto.
        return $this->belongsTo(CashFlowCategory::class, 'category_id');
    }

    /**
     * Get the cash flows for this subcategory.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cashFlows()
    {
        // Una subcategoría puede estar asociada con varios flujos de caja.
        return $this->hasMany(CashFlow::class, 'subcategory_id');
    }

    // ...agrega aquí cualquier otro método que necesites...
}
