<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	static $password;
        factory(App\User::class)->create([
    		'first_name' 	=> 'Luis',
    		'last_name' 	=> 'Rivas',
            'twitter'       => 'luitter',
    		'role'		 	=> 'admin',
            'password'      => $password ?: $password = bcrypt('123'),
    		'email'			=> 'luis@gmail.com'
    	]);

        factory(App\User::class, 10)->create();
    }
}
