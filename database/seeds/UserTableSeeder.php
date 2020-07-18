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
        $user=\App\User::create([
            'name'=> 'Super Admin',
            'email'=> 'superAdmin@app.com',
            'password'=>bcrypt('secret')
        ]);
        $user->attachRole('super_admin');
    }
}
