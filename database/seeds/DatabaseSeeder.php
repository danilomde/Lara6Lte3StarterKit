<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);

         //permissions
         $this->call(PermissionTableSeeder::class);


    	//role
		$this->call(RoleTableSeeder::class); 

    	//user
         $this->call(UserTableSeeder::class);


    }
}
