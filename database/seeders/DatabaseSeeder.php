<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'ser',
            'email' => 'totet@example.com',
        ]);

        $users = [
            [
                'name'=> 'Dava', 'email'=>'dava@example.com', 'password'=> bcrypt('12345678'), 'role'=>'Admin',
            ],
            [
                'name'=> 'Robby', 'email'=>'robby@example.com', 'password'=> bcrypt('87654321'), 'role'=>'Petugas',
            ],
        ];

        foreach ($users as $user => $value) {
            User::create($value);
        }

        $this->call([
            ReportSeeder::class,
        ]);
    }
}
