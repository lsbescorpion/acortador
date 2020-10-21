<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GananciasDiarias extends Model
{
    protected $table = 'ganancias_diarias';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function urls()
    {
        return $this->belongsTo(Urls::class, 'url_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
