<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\BusinessCodeCourses;

class BusinessCodeCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessCodeCourses::create([
        	'name' 		=>	'Angular 4'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Metodologías Scrum'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Servicios REST con Django'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Git:Introduccion y flujos de trabajo'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Xamarin'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'React + Redux'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Reacnative'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Scala Introduction'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Spark para Scala'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Desarrollo de APIS en node.js con Express y Mongo'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Aplicaciones cross-platform con Electron'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Devops con AWS'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Docker'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Ansible'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Desarrollo de videojuegos con Unity 3D'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Desarrollo de videojuegos con Unreal Engine'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Go programming language'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Criptografia: Algoritmos'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Desarrollo de webs estáticas con Hugo'
        ]);
        BusinessCodeCourses::create([
        	'name' 		=>	'Programación en R para ciencias de datos'
        ]);
    }
}
