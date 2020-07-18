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
        $superAdmin=\App\Role::create([
            'name'        => 'super_admin',
            'display_name'=>'super admin',
            'description' =>'this role can do any thing'
        ]);
        $admin = \App\Role::create([
            'name'        => 'admin',
            'display_name'=>'admin',
            'description' =>'this role can do permission given by super admin'
        ]);

        $user = \App\Role::create([
            'name'        =>'user',
            'display_name'=>'user',
            'description' =>'this is an normal user'
        ]);
    }
}
