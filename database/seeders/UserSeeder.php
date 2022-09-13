<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),

        ]);

        User::create([
            'name' => 'Dalal',
            'email' => 'dalalbassam2@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),

        ]);
    }
}
