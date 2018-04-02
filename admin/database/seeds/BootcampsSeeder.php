<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Bootcamps;

class BootcampsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bootcamps::create([
        	'name' 		=>	'Full Stack Web Development'
        ]);
        Bootcamps::create([
        	'name' 		=>	'Videogames Development'
        ]);
    }
}
