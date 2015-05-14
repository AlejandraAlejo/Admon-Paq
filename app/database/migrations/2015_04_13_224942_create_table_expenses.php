<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExpenses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function($tabla)
		{
			$tabla->increments('id');
			$tabla->string('description', 100);
			$tabla->date('date');
			$tabla->float('amount');
			$tabla->integer('supplier_id')->unsigned();
			$tabla->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expenses');
	}

}
