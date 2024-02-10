<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Balance;
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
            'balance' => 100000,
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@enabung.com',
            'balance' => 200000,
            'password' => bcrypt('user123'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        Balance::create([
            'user_id' => 2,
            'added_balance' => 100000,
            'reduced_balance' => 0,
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        Balance::create([
            'user_id' => 2,
            'added_balance' => 100000,
            'reduced_balance' => 0,
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

        Balance::create([
            'user_id' => 1,
            'added_balance' => 100000,
            'reduced_balance' => 0,
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);

    }
}
