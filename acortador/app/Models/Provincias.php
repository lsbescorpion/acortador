<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    protected $table = 'provincias';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function municipios()
    {
        return $this->hasMany(Municipios::class, 'provincia_id');
    }
}
