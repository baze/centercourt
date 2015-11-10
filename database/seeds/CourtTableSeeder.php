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
			'name' => 'Halle 1',
			'type' => 'indoor'
		] );

		Court::create( [
			'name' => 'Halle 2',
			'type' => 'indoor'
		] );

		Court::create( [
			'name' => 'Halle 3',
			'type' => 'indoor'
		] );

		Court::create( [
				'name' => 'Halle 4',
				'type' => 'indoor'
		] );
	}

}
