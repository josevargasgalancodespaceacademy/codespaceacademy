<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Subjects;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subjects::create([
            'name' 		=>	'Metodología de programación',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Introducción a BBDD',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Introducción al desarrollo web',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Introducción a la programación',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'BBDD avanzado: SQL y NoSQL',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'HTML5 y CSS3',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Ecmascript6, Jquery, Backbone',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Algoritmos y estructuras de datos',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Inglés',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'NodeJS y ExpressJS',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'MongoDB',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Diseño de APIS.REST',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'React/Redux',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Sistemas de paquetería',
            'bootcamp_id' => 1
        ]);
         Subjects::create([
            'name' 		=>	'Full Stack: 0 a producción',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Gestión de proyectos: Scrum',
            'bootcamp_id' => 1
        ]);
        Subjects::create([
            'name' 		=>	'Matemáticas para desarrolladores',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Introducción a la programación en C#',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Introducción a Unity 2D',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Creación de escenarios 3D',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Desarrollo de gameplays',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Animaciones en Unity',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Creación de interfaces gráficas de usuarios',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Introducción al game design',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Introducción a Unreal Engine',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Introducción a la realidad virtual',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Convierte tu videojuego en un negocio',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Inteligencia artificial, algoritmos avanzados y multijugador',
            'bootcamp_id' => 2
        ]);
        Subjects::create([
            'name' 		=>	'Análisis de datos',
            'bootcamp_id' => 2
        ]);
    }
}
