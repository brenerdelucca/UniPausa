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

         \App\Models\User::factory()->create([
             'nome_atendente' => 'Gerente',
             'email' => 'gerente@example.com',
             'is_supervisor' => false,
             'is_adm' => true,
         ]);

         \App\Models\User::factory()->create([
            'nome_atendente' => 'Supervisor',
            'email' => 'supervisor@example.com',
            'is_supervisor' => true,
            'is_adm' => false,
        ]);

        \App\Models\User::factory()->create([
            'nome_atendente' => 'Gerente e supervisor',
            'email' => 'gep@example.com',
            'is_supervisor' => true,
            'is_adm' => true,
        ]);
    }
}
