<?php


use Phinx\Seed\AbstractSeed;

class NewsletterSubscriberSeeder extends AbstractSeed
{

    public function run()
    {


        $faker = Faker\Factory::create();
        $data = [];

        $table = $this->table('newsletter_subscriptions');
        $table->truncate();


        for ($i = 0; $i < 100; $i++) {

            $randomUnsubscriber = rand(1,15);

            if ($randomUnsubscriber === 15) {
                $data[] = [
                    'email'=> $faker->email,
                    'subscribed' => 0,
                    'created' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = date_default_timezone_get()),'Y-m-d H:i:s'),
                    'updated' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = date_default_timezone_get()),'Y-m-d H:i:s'),
                    'comment_unsubscribe' => $faker->paragraph($nbSentences = rand(1,5), $variableNbSentences = true),
                ];
            } else {
                $data[] = [
                    'email'=> $faker->email,
                    'subscribed' => 1,
                    'created' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months', $timezone = date_default_timezone_get()),'Y-m-d H:i:s'),
                    'updated' => null,
                    'comment_unsubscribe' => null,
                ];

            }    
        }

        $table = $this->table('newsletter_subscriptions');
        $table->insert($data)->save();
    }
}
