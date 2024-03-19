<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

// Traits
use App\Traits\AutoGenerateUuid;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\Translations\Traits\TraitTranslate;

//import module ticket entitie staff
use Modules\Tickets\Entities\TicketStaff;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable,AutoGenerateUuid ,HasRoleAndPermission,TraitTranslate;
    use \OwenIt\Auditing\Auditable;



    protected $fillable = [
        'name',
        'lastname',
        'email',
        'lote',
        'password',
        'google_id',
    ];
    protected $dates = ['deleted_at'];
    // public $incrementing = false;
    protected $keyType = 'string';
    protected $hidden = ['password', 'remember_token',];


    public $translatedAttributes = ['name','lastname'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*---------------------------------SCOPES-------------------------------*/
    public function getRouteKeyName()
    {
      return 'uuid';
    }
    /*---------------------------------SCOPES-------------------------------*/


    protected static function boot() {
        parent::boot();//se agrega esto para que funcione el boot de la clase padre y de otros traits
        static::saved(function ($model) {
                // Manejar las traducciones solo para nuevos registros
                $model->createLanguageTranslations($model);
        });
    }




    // relation staff
    public function staff()
    {
        return $this->belongsTo(TicketStaff::class,'user_id');
    }


}
