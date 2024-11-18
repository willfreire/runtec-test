<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $table = 'tb_tema';

    protected $fillable = ['tema'];

    public function noticias()
    {
        return $this->belongsToMany(Noticia::class, 'tb_tema_noticia', 'temaId', 'noticiaId');
    }
}
