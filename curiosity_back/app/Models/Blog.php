<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog_url';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
