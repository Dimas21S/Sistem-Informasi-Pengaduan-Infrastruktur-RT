<?php

namespace Database\Seeders;

use Database\Factories\ReportFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake();

        for ($i = 0; $i < 50; $i++) {

            // Random bulan (1–12)
            $month = rand(1, 12);

            // Generate tanggal random dalam bulan itu
            $year = 2024; // Bisa diganti tahun lain
            $start = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-01";
            $end   = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-28";

            DB::table('reports')->insert([
                'user_id' => User::inRandomOrder()->first()->id ?? 1,
                'judul_laporan' => $faker->sentence(3),
                'isi_laporan' => $faker->paragraph(4),
                'status' => $faker->randomElement(['pending','progress','completed']),
                'foto_bukti' => null, // bisa diganti $faker->imageUrl()
                'tanggal_laporan' => $faker->dateTimeBetween($start, $end),
            ]);
        }
    }
}
