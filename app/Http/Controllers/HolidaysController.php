<?php namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Support\Facades\Input;

class HolidaysController extends Controller {


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
		$holidays = Holiday::all();

		return view( 'holidays.index' )
			->with( 'holidays', $holidays );
	}

	public function create(  ) {
		return view( 'holidays.create' );
	}

	public function store() {

		Holiday::create( Input::all() );

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
