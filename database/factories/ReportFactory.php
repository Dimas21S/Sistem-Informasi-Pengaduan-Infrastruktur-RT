<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? 1,
            'judul_laporan' => fake()->sentence(3),
            'isi_laporan' => fake()->paragraph(4),
            'status' => fake()->randomElement(['pending','progress','completed']),
            'foto_bukti' => null, // atau fake()->imageUrl()
            'tanggal_laporan' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
