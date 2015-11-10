<?php namespace App\Http\Controllers;

use App\Court;
use App\Holiday;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ReservationsController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(\Mobile_Detect $detect)
	{
		$courts = Court::all();
		$reservations = Reservation::calculate( Reservation::all() );
		$holidays = Holiday::calculate( Holiday::all() );

		$minTime = 8;
		$maxTime = 23;
		$timeSpan = $maxTime - $minTime;

		$minDate = Carbon::now();
		$maxDate = Carbon::now()->addMonths(2);

		if (\Auth::check()) {
			$email = \Auth::user()->email;
		} else {
			$email = null;
		}

		\JavaScript::put( [
				'reservations' => $reservations,
				'minTime'      => $minTime,
				'maxTime'      => $maxTime,
				'minDate'      => $minDate,
				'maxDate'      => $maxDate,
				'email'        => $email,
				'holidays'     => $holidays
		] );

		return view( 'reservations' )
			->with( 'courts', $courts )
			->with( 'detect', $detect )
			->with( 'minTime', $minTime )
			->with( 'maxTime', $maxTime )
			->with( 'timeSpan', $timeSpan )
			->with( 'minDate', $minDate )
			->with( 'maxDate', $maxDate );
	}

	public function destroy( $id ) {
		$reservation = Reservation::find( $id );

		if ( $reservation ) {
//		if ( ! $reservation->recurring ) {
			$reservation->delete();
		}

		return redirect()->back();
	}

}