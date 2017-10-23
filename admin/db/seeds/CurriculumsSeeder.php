<?php


use Phinx\Seed\AbstractSeed;

class CurriculumsSeeder extends AbstractSeed
{

    public function run()
    {


        $faker = Faker\Factory::create();
        $data = [];

        $table = $this->table('curriculums');
        $table->truncate();


        for ($i = 0; $i < 50; $i++) {

            $name = $faker->name;

            $data[] = [
                'name' => $name,
                'email'=> $faker->email,
                'telephone' => mt_rand(100000000,999999999),
                'website' => rand(1,10) >= 8 ? $faker->url : null,
                'linkedin' => rand(1,10) >= 6 ? "http://www.linkedin.com/in/". strtolower(preg_replace('/\s+/', '', $name)) : null,
                'route_curriculum_pdf' => 'example_curriculum.pdf',
                'created' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = date_default_timezone_get()),'Y-m-d H:i:s'),
            ];

        }

        $table->insert($data)->save();
    }
}
