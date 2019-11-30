<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitasDiarias extends Model
{
    protected $table = 'visitas_diarias';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
