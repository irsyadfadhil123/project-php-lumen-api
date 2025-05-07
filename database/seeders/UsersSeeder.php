<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'Sudemo Mardemo',
            'email' => 'sudemo@gmail.com',
            'password' => Hash::make('pass_demo')
        ]);
    }
}
