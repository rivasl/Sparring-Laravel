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
    		static $brandi;

    		$faker = new Faker\Generator();
     		$faker->addProvider(new Faker\Provider\Brand($faker));
     		$faker->addProvider(new Faker\Provider\ModelVehicle($faker));
     		
     		$brandi = $faker->brand;
    		factory(App\Vehicle::class)->create([
   				'brand' 	=> $brandi,
    			'model'		=> $faker->modelveh($brandi),
    		]);

    	    factory(App\Vehicle::class, 20)->create();
    }
}
