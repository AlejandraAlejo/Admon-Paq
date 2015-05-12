<?php

class UserTypesTableSeeder extends Seeder {
 
    public function run()
    {
 
        DB::table('user_types')->insert(array(
                'name' => 'Administrador'
        ));
 
        DB::table('user_types')->insert(array(
                'name' => 'Secretario'
        ));
    }
}