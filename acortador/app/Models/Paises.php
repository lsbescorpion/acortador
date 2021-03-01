<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'countries';

    protected $primaryKey = 'iso_a2';

    public $timestamps = false;
}
