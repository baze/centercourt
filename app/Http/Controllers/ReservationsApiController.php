<?php namespace App\Http\Controllers;

use App\Court;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
		$reservation = Reservation::create(Input::all());

		// TODO: Use Events here.

		$mailer = new \App\Mailers\ReservationMailer();
		$mailer->notifyAboutReservation($reservation);

		if ($reservation->recurring) {

			$reservations = ReservationController::calculateEventsForReservation( $reservation, new Collection() );

			return response()->json( $reservations );
		}

		return response()->json($reservation);
	}

}
