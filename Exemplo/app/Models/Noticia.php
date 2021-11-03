<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //public $timestamps = false;
    protected $fillable = ['titulo', 'noticia', 'imagem', 'user_id'];

    public function relUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

