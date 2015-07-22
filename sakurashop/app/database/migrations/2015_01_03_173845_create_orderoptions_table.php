<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderoptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderoptions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('"order_id');
			$table->integer('orderproduct_id');
			$table->integer('option_id');
			$table->integer('optionvalue_id');
			$table->string('name');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderoptions');
	}

}
