<?php


use Phinx\Seed\AbstractSeed;

class PromotionEntrySeeder extends AbstractSeed
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];

        $table = $this->table('promotion_entries');
        $table->truncate();


        for ($i = 0; $i < 50; $i++) {

            $type_identification = rand(1,10) >= 9 ? 'nie' : 'dni';
            $number_identification;

            if ($type_identification === 'dni') {
                $number_identification = mt_rand(00000000,99999999); 
            } else {
                $number_identification = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 1)), 0, 1) . mt_rand(0000000,9999999);
            }
            $number_identification .= substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($number_identification,"XYZ","012")%23,1);

            $data[] = [
                'name' => $faker->firstName,
                'surnames' =>  rand(1,10) >= 3 ? $faker->lastName . " " . $faker->lastName : $faker->lastName,
                'email'=> $faker->email,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '1999-09-12'),
                'type_identification' => $type_identification,
                'number_identification' => $number_identification,
                'telephone' => mt_rand(100000000,999999999),
                'city' => $faker->city,
                'comment' => rand(1,10) >= 8 ? $faker->paragraph($nbSentences = rand(1,5), $variableNbSentences = true) : null,
                'created' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = date_default_timezone_get()),'Y-m-d H:i:s'),
            ];

        }

        $table->insert($data)->save();
    }
}
