<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()-> create([
            'name' => 'Otong Supriadi',
            'username' => 'otongsup',
            'email' => 'otong@gmail.com'
        ]);
        
        User::factory()-> create([
            'name' => 'Ucup Surucup',
            'username' => 'ucupsur',
            'email' => 'ucup@gmail.com'
        ]);

        User::factory()-> create([
            'name' => 'Alex Ngatiem',
            'username' => 'alextiem',
            'email' => 'alex@gmail.com'
        ]);

        User::factory(2)->create();
    }
}
