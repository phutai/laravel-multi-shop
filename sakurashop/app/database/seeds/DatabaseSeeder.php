<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('StoresTableSeeder');
		$this->call('TweetsTableSeeder');
		$this->call('ShopinfosTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('OrdersTableSeeder');
		$this->call('ProductoptionsTableSeeder');
		$this->call('OptionsTableSeeder');
		$this->call('OptionvaluesTableSeeder');
		$this->call('OrderproductsTableSeeder');
		$this->call('OrderoptionsTableSeeder');
		$this->call('SlidersTableSeeder');
		$this->call('SlidesTableSeeder');
	}

}
