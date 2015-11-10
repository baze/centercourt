<?php

use App\Holiday;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HolidayTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		DB::table( 'holidays' )->truncate();


		Holiday::create( [ 'start_date' => '2015-12-23', 'end_date' => '2016-01-08' ] );
		Holiday::create( [ 'start_date' => '2016-03-18', 'end_date' => '2016-04-01' ] );
		Holiday::create( [ 'start_date' => '2016-05-01', 'end_date' => '2016-05-01' ] );
		Holiday::create( [ 'start_date' => '2016-05-16', 'end_date' => '2016-05-16' ] );
		Holiday::create( [ 'start_date' => '2016-05-26', 'end_date' => '2016-05-26' ] );
		Holiday::create( [ 'start_date' => '2016-07-18', 'end_date' => '2016-08-26' ] );
		Holiday::create( [ 'start_date' => '2016-10-03', 'end_date' => '2016-10-03' ] );
		Holiday::create( [ 'start_date' => '2016-11-01', 'end_date' => '2016-11-01' ] );
		Holiday::create( [ 'start_date' => '2016-12-22', 'end_date' => '2017-01-06' ] );

	}

}
