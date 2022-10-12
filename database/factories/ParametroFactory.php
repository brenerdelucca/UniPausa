<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parametro>
 */
class ParametroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'qntd_pessoas_pausa' => 1,
            'tempo_pausa' => '00:15:00',
            'pausas_por_dia_por_pessoa' => 1
        ];
    }
}
