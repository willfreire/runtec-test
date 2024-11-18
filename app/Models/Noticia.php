<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'tb_noticia';

    protected $fillable = ['titulo', 'assunto', 'autor'];

    public function temas()
    {
        return $this->belongsToMany(Tema::class, 'tb_tema_noticia', 'noticiaId', 'temaId');
    }
}
