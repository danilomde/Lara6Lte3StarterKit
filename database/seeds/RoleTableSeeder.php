<?php


use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = [
           'Admin',
           'Franqueado'
        ];


        foreach ($roles as $role) {
             DB::table('roles')->insert([
             	'name' => $role,
             	'guard_name' => 'web'
             ]);

        }


        $roles = DB::table('permissions')->get();

        foreach ($roles as $role) {
             DB::table('role_has_permissions')->insert([
             	'permission_id' => $role->id,
             	'role_id' => '1'
             ]);
        }

    }
}
