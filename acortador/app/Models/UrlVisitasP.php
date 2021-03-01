<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlVisitasP extends Model
{
    protected $table = 'url_visita_pais';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function url()
    {
        return $this->belongsTo(Urls::class, 'url_id');
    }
}
