<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->truncate();

        $faker = Faker::create();

        foreach (range(1,20) as $index) {
        	DB::table('events')->insert([
        	[
        		'title' 		=> $faker->sentence($nbWords = 5, $variableNbWords = true),
        		'description' 	=> $faker->sentence($nbWords = 15, $variableNbWords = true),
        		'status' 		=> $faker->randomElement($array = array ('Critical','Intermitant','Resolved')),
        		'scheduled_for' => $faker->dateTimeBetween('-1 month', '+10 days')
        	]
        	]);
        }

    }
}
