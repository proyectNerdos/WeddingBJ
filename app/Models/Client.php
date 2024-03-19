<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
//Model
use Modules\CashFlow\Entities\CashFlow;
class Client extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = true;
    protected $table = 'clients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid',
        'name',
        'lastname',
        'email',
        'lote',
        'image',
        'image_filename',
        'thumbsnail',
        'thumbsnail_filename',
        'dni',
        'address',
        'phone',
        'country',
        'province',
        'city',
        'cp'
    ];

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    //relacion con chasflow
    public function cashflow()
    {
        return $this->hasMany(CashFlow::class, 'client_id', 'id');
    }


     /*
     *-------------- Accessors and Mutators-----------------
     */

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }
}
