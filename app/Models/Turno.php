<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_turno',
        'hr_inicio',
        'hr_fim',
        'hr_inicio_almoco',
        'hr_fim_almoco',
        'limite_hr_pausa_manha',
        'limite_hr_pausa_tarde',
        'ativo'
    ];
}
