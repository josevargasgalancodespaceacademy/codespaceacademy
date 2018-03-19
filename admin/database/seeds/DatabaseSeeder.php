<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
     $this->call([
         BootcampsSeeder::class,
         BusinessCodeCoursesSeeder::class
     ]);
    }
}
