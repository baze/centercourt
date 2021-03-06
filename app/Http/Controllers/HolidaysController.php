<?php namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class HolidaysController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		View::share( 'pageTitle', 'Ferienzeiten' );
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$holidays = Holiday::all();

		return view( 'holidays.index' )
			->with( 'holidays', $holidays );
	}

	public function create(  ) {
		View::share( 'pageTitle', 'Ferienzeiten erstellen' );

		return view( 'holidays.create' );
	}

	public function store() {

		$input = Input::all();

		$validator = Validator::make( $input, [
				'start_date' => 'required',
				'end_date'  => 'required',
		] );

		if ( $validator->fails() ) {
			return redirect()->back()
					->withErrors( $validator )
					->withInput();
		}

		Holiday::create( $input );

		return redirect()->back();
	}

	public function destroy($id) {
		$holiday = Holiday::find($id);

		if ($holiday) {
			$holiday->delete();
		}

		return redirect()->back();
	}

}
