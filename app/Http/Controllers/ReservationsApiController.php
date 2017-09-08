<?php namespace App\Http\Controllers;

use App\Court;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ReservationsApiController extends Controller {

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
	public function index()
	{

		$reservations = Reservation::all();

		return response()->json( $reservations );

	}

	public function store() {

		if (Auth::guest()) {
			$reservation = new Reservation( Input::all() );

			$mailer = new \App\Mailers\ReservationMailer();
			$mailer->notifyAboutReservation( $reservation );

		} else {
			$reservation = Reservation::create( Input::all() );

			if ( $reservation->recurring ) {

				$reservations = new Collection();
				$reservations->add( $reservation );

				$reservations = Reservation::calculate( $reservations );

				return response()->json( $reservations );
			}

			return response()->json( $reservation );
		}

		return null;
	}

}
