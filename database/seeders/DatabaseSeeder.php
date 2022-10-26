<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Turno::factory()->create([
            'nome_turno' => 'Turno exclusivo do gerente (não mexer)',
            'hr_inicio' => '00:00:00',
            'hr_fim' => '23:59:59',
            'hr_inicio_almoco' => '12:35:00',
            'hr_fim_almoco' => '12:36:00',
            'limite_hr_pausa_manha' => '12:34:00',
            'limite_hr_pausa_tarde' => '23:58:00',
            'ativo' => true,
        ]);

        \App\Models\Turno::factory()->create([
            'nome_turno' => 'Turno das 8',
            'hr_inicio' => '08:00:00',
            'hr_fim' => '18:00:00',
            'hr_inicio_almoco' => '12:35:00',
            'hr_fim_almoco' => '14:00:00',
            'limite_hr_pausa_manha' => '11:35:00',
            'limite_hr_pausa_tarde' => '17:00:00',
            'ativo' => true,
        ]);

         \App\Models\User::factory()->create([
             'nome_atendente' => 'Gerente',
             'email' => 'gerente@example.com',
             'is_supervisor' => false,
             'is_adm' => true,
             'turno_id' => 1,
         ]);

         \App\Models\User::factory()->create([
            'nome_atendente' => 'Supervisor',
            'email' => 'supervisor@example.com',
            'is_supervisor' => true,
            'is_adm' => false,
            'turno_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'nome_atendente' => 'Atendente',
            'email' => 'ate@example.com',
            'is_supervisor' => false,
            'is_adm' => false,
            'turno_id' => 2,
        ]);

        \App\Models\Parametro::factory()->create([
            'qntd_pessoas_pausa' => 2,
            'tempo_pausa' => '00:15:00',
            'pausas_por_dia_por_pessoa' => 1
        ]);
    }
}
