<?php

use App\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ReservationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/*Reservation::create( [
			'name' => 'Halle 1',
			'type' => 'indoor'
		] );*/

	}

}
