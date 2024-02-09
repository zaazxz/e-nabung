<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@enabung.com',
            'balance' => 0,
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@enabung.com',
            'balance' => 0,
            'password' => bcrypt('user123'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

    }
}
