<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($tabla)
		{
			$tabla->increments('id');
			$tabla->string('user', 45);
			$tabla->string('password', 200);
            $tabla->string('password_decrypted', 200);
			$tabla->timestamps();
            $tabla->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
