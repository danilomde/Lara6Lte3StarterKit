<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
        ]);


        $users = DB::table('users')->get();

        foreach ($users as $user ) {

        	if($user->id <= 2 ){
				$rid = 1;        			
        	}else{
        		$rid = 2;
        	}

        	DB::table('model_has_roles')->insert([        		
        		'role_id' => $rid,
        		'model_type' => 'App\User',
        		'model_id' => $user->id
        	]);

        }



    }
}
