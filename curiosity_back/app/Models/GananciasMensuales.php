<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GananciasMensuales extends Model
{
    protected $table = 'ganancias_mensuales';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
