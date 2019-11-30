<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function urls()
    {
        return $this->hasMany(Urls::class, 'categoria_id');
    }
}
