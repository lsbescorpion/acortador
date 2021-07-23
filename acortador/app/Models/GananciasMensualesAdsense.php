<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GananciasMensualesAdsense extends Model
{
    protected $table = 'ganancias_mensuales_adsense';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
