<?php

use Illuminate\Database\Seeder;
use App\User;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
          User::create([
            'name' => 'System',
            'last_name'  => 'Administrator',
            'username'   => 'admin',
            'email'      => 'jose.f.vargas@codespaceacademy.com',
            'password'   =>  Hash::make('codespaceoctubre')
            ]);
    }
}
