<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    protected $table = 'urls';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ganancias()
    {
        return $this->hasMany(GananciasDiarias::class, 'url_id');
    }

    public function visitasp()
    {
        return $this->hasMany(UrlVisitasP::class, 'url_id');
    }
}
