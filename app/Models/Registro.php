<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'dt_pausa',
        'hr_inicio_pausa',
        'hr_fim_pausa',
        'tempo_estimado_pausa',
        'user_id'
    ];
}
