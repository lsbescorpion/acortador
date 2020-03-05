<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlVisitaR extends Model
{
    protected $table = 'url_visita_refer';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function url()
    {
        return $this->belongsTo(Urls::class, 'url_id');
    }
}
