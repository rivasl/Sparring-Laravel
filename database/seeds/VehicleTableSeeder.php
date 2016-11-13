<?php

use Illuminate\Database\Seeder;
require_once 'VehicleBrand.php';

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		$faker = new Faker\Generator();
     		$faker->addProvider(new Faker\Provider\Brand($faker));
     		$faker->addProvider(new Faker\Provider\ModelVehicle($faker));

    		factory(App\Vehicle::class)->create([
   				'brand' 	=> $faker->brand,
    			'model'		=> $faker->modelveh,
    		]);

    	    factory(App\Vehicle::class, 20)->create();
    }
}
