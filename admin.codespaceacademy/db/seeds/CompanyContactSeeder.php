<?php


use Phinx\Seed\AbstractSeed;

class CompanyContactSeeder extends AbstractSeed
{

    public function run()
    {


        $faker = Faker\Factory::create();
        $data = [];

        $table = $this->table('company_contacts');
        $table->truncate();

        $request;
        $requestRand = rand(1,3);
        if ($requestRand === 1) $request = 'si';
        else if ($requestRand === 2) $request = 'no';
        else $request = 'otro';

        for ($i = 0; $i < 100; $i++) {

            $data[] = [
                'name' => $faker->name,
                'email'=> $faker->email,
                'telephone' => mt_rand(100000000,999999999),
                'company_name' => $faker->company,
                'company_link' => rand(1,10) >= 7 ? $faker->url : null,
                'training_request' => $request,
                'comment' => rand(1,10) >= 7 ? $faker->paragraph($nbSentences = rand(1,5), $variableNbSentences = true) : null,
                'created' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = date_default_timezone_get()),'Y-m-d H:i:s'),
            ];

        }

        $table->insert($data)->save();
    }
}
