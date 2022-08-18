<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    use HasFactory;

    protected $fillable = [
        'qntd_pessoas_pausa',
        'tempo_pausa',
        'pausas_por_dia_por_pessoa'
    ];
}
