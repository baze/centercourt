<?php namespace App\Http\Controllers;

use App\Court;
use App\Holiday;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ReservationsController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		View::share( 'pageTitle', 'Reservierungen' );
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(\Mobile_Detect $detect)
	{
		$courts = Court::all();
		$reservations = Reservation::getAll();
		$holidays = Holiday::getAll();

		$minTime = 8;
		$maxTime = 23;
		$timeSpan = $maxTime - $minTime;

		$minDate = Carbon::now();

		if (Auth::check()) {
			$maxDate = Carbon::now()->addMonths( 12 );
		} else {
			$maxDate = Carbon::now()->addMonths( 2 );
		}


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
			$reservation->delete();
		}

		return redirect()->back();
	}

}
