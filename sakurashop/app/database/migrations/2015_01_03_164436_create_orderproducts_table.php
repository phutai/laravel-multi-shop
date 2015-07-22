<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderproductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderproducts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('product_id');
			$table->string('name');
			$table->integer('quantity');
			$table->float('price');
			$table->float('total');
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
		Schema::drop('orderproducts');
	}

}
