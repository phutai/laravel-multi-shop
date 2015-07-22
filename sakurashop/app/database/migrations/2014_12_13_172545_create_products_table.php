<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->decimal('sale_price');
			$table->decimal('special_price');
			$table->string('model');
			$table->string('alias');
			$table->integer('quantity');
			$table->string('name');
			$table->integer('category_id');
			$table->text('size');
			$table->text('material');
			$table->text('color');
			$table->text('image');
			$table->integer('status');
			$table->text('description');
			$table->text('meta_title');
			$table->text('meta_keywords');
			$table->text('meta_description');
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
		Schema::drop('products');
	}

}
