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
		$this->call('MetasTableSeeder');
		$this->call('ResponsablesTableSeeder');
		$this->call('PartidasTableSeeder');
		$this->call('EjerciciosTableSeeder');
		$this->call('AccionesTableSeeder');
		$this->call('DepartamentosTableSeeder');
	}

}
