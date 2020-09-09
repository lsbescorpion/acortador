<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitasDiariasUrl extends Model
{
    protected $table = 'visitas_diarias_url';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function url()
    {
        return $this->belongsTo(Urls::class, 'url_id');
    }
}
