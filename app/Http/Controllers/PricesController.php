<?php namespace App\Http\Controllers;

use App\Price;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PricesController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		View::share( 'pageTitle', 'Preise' );
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prices = Price::all();

		return view( 'prices.index' )
			->with( 'prices', $prices );
	}

	public function create(  ) {
		return view( 'prices.create' );
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

		Price::create( $input );

		return redirect()->back();
	}

	public function destroy($id) {
		$price = Price::find($id);

		if ($price) {
			$price->delete();
		}

		return redirect()->back();
	}

}
