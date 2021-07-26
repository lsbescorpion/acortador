<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    protected $table = 'user';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'user_id');
    }

    public function urls()
    {
        return $this->hasMany(Urls::class, 'user_id');
    }

    public function visitasd()
    {
        return $this->hasMany(VisitasDiarias::class, 'user_id');
    }

    public function ganancias()
    {
        return $this->hasMany(GananciasDiarias::class, 'user_id');
    }

    public function adsense()
    {
        return $this->hasMany(GananciasDiariasAdsense::class, 'user_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
