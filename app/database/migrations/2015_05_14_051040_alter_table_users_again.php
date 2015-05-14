<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAgain extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->dropColumn('password_decrypted');
		});
		Schema::table('users', function($table){
			$table->string('pass_encrypt', 200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table){
			$table->dropColumn('pass_encrypt');
		});
		Schema::table('users', function($table){
			$table->string('password_decrypted', 200);
		});
	}

}
