<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenTropipay extends Model
{
    protected $table = 'token_tropipay';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
