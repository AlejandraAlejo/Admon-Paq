<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});

		Schema::table('expenses', function($table){
			$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('RESTRICT')->onUpdate('CASCADE');
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
			$table->dropForeign('users_user_type_id_foreign');
		});

		Schema::table('expenses', function($table){
			$table->dropForeign('expenses_supplier_id_foreign');
		});
	}

}
