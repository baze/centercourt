<?php

use App\Court;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CourtTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table( 'courts' )->truncate();

		Court::create( [
			'name' => 'Platz 1',
			'type' => 'indoor'
		] );

		Court::create( [
			'name' => 'Platz 2',
			'type' => 'indoor'
		] );

		Court::create( [
			'name' => 'Platz 3',
			'type' => 'indoor'
		] );

		Court::create( [
				'name' => 'Halle2',
				'type' => 'indoor'
		] );
	}

}
