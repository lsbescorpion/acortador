<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function provincia()
    {
        return $this->belongsTo(Provincias::class, 'provincia_id');
    }
}
