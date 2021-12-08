<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTropipay extends Model
{
    protected $table = 'user_tropipay';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
