<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model {

	protected $fillable = [ 'start_date', 'end_date' ];

	public static function getAll() {
		return static::calculate( static::all() );
	}

	private static function calculate( $holidays ) {

		foreach ( $holidays as $holiday ) {
			$endDate = $holiday->end_date;

			if ( ! $endDate ) {
				$endDate = Carbon::now()->addMonths( 6 );
			}

			$date = Carbon::createFromFormat( 'Y-m-d', $holiday->start_date );

			while ( $date <= $endDate ) {

				$date->addDay();

				$day = new Holiday( array_merge( $holiday->toArray(), [
						'start_date' => $date->format( 'Y-m-d' )
				] ) );

				$holidays->add( $day );
			}
		}

		return $holidays;
	}

}
