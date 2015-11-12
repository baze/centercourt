<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reservation extends Model {

	protected $guarded = [

	];

	public static function boot() {
		parent::boot();

		static::creating( function ( $reservation ) {
			$reservation->reservation_number = Str::random(6);
		} );
	}

	public static function getAll() {
		return static::calculate( static::all() );
	}

	private static function nthOfWeekFromDate( $date ) {

		$weekDayOfDate = (int) $date->format( 'w' );

		$nth = null;

		for ( $i = 1; $i <= 5; $i ++ ) {
			$temp = $date->copy()->nthOfMonth( $i, $weekDayOfDate );

			if ( $temp ) {

				if ( $date->format( 'Y-m-d' ) == $temp->format( 'Y-m-d' ) ) {
					$nth = $i;
				}

			}

		}

		return $nth;
	}

	private static function calculate( $reservations ) {

		foreach ( $reservations as $reservation ) {

			if ($reservation->recurring) {

				if ( $reservation->end_date ) {
					$endDate = Carbon::createFromFormat( 'Y-m-d', $reservation->end_date );
				} else {
					$endDate = Carbon::now()->addMonths( 6 );
				}

				$date      = Carbon::createFromFormat( 'Y-m-d', $reservation->date );
				$startDate = $date->copy();

				while ( $date < $endDate ) {

					switch ( $reservation->recurring_interval ) {
						case 'daily':
							$date->addDay();
							break;
						case 'weekly':

							$date->addWeeks( $reservation->recurring_interval_weeks ?: 1 );

							break;
						case 'monthly':

							$nth     = static::nthOfWeekFromDate( $startDate );
							$weekday = (int) $date->format( 'w' );

							if ( $nth == 5 ) {
								$date->addMonth()->lastOfMonth( $weekday );
							} else {
								$date->addMonth()->nthOfMonth( $nth, $weekday );
							}

//					$date->addMonth();

							break;
						default:
							break;
					}

					if ( $date <= $endDate ) {
						$r = new Reservation( array_merge( $reservation->toArray(), [
								'date' => $date->format( 'Y-m-d' )
						] ) );

						$reservations->add( $r );
					}

				}
			} else {
				$reservations->add( $reservation );
			}
		}

		return $reservations;
	}

}
