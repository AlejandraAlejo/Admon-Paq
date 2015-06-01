<?php

class UserAdminSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->insert(array(
            'user' => 'admin',
            'password' => Hash::make('123456789'),
        	'pass_encrypt' => Crypt::encrypt('123456789'),
        	'user_type_id' => 1
        ));
    }
}