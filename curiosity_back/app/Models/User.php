<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table = 'user';

    protected $primaryKey = 'id';

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

    public function blog()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
}
