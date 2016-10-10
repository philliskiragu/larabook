<?php

	use Illuminate\Support\Facades\DB;

	class DatabaseSeeder extends Seeder {

	protected $tables = ['users', 'statuses'];

	protected $seeders = ['UsersTableSeeder', 'StatusesTableSeeder'];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabase();

		foreach ($this->seeders as $seeder){
			$this->call($seeder);
		}
	}

	/**
	 *Clean out the database for new data
     */
	private function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this->tables as $table){
			DB::table($table)->truncate();
		}
	}

}
