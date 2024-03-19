<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

//traits
use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CashFlow\Entities\CashFlow;
class Employee extends Model
{

    use SoftDeletes;
    use AutoGenerateUuid;


    public $timestamps = true;
    protected $table = 'employees';
    protected $primaryKey = 'id';

    protected $fillable = [
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

    public function cashflows()
    {
        return $this->hasMany(CashFlow::class, 'employee_id', 'id');
    }

    public function cashflowsSec1()
    {
        return $this->hasMany(CashFlow::class, 'employee_sec1_id', 'id');
    }

    public function cashflowsSec2()
    {
        return $this->hasMany(CashFlow::class, 'employee_sec2_id', 'id');
    }

     /*
     *-------------- Accessors and Mutators-----------------
     */

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }
}
