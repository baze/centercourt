<?php namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PostsController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		View::share( 'pageTitle', 'Nachrichten' );
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::withTrashed()->orderBy( 'created_at', 'desc' )->get();

		return view( 'posts.index' )
			->with( 'posts', $posts );
	}

	public function create(  ) {
		View::share( 'pageTitle', 'Nachricht erstellen' );

		return view( 'posts.create' );
	}

	public function show($id) {
		$post = Post::withTrashed()->find($id);

		return view( 'posts.show' )
			->with( 'post', $post );
	}

	public function edit( $id ) {
		$post = Post::withTrashed()->find( $id );

		View::share( 'pageTitle', 'Nachricht bearbeiten' );

		return view( 'posts.edit' )
			->with( 'post', $post );
	}

	public function store() {

		$input = Input::all();

		$validator = Validator::make( $input, [
			'title' => 'required',
			'content' => 'required'
		] );

		if ( $validator->fails() ) {
			return redirect()->back()
					->withErrors( $validator )
					->withInput();
		}

		$post = Post::create( $input );
//		$post = new Post( $input );

		$mailer = new \App\Mailers\PostMailer();
		$mailer->notifyAboutPost( $post );

		return redirect()->route('posts.index');
	}

	public function update( $id ) {
		$post = Post::withTrashed()->find( $id );

		$input = Input::all();

		$validator = Validator::make( $input, [
			'title'   => 'required',
			'content' => 'required'
		] );

		if ( $validator->fails() ) {
			return redirect()->back()
			                 ->withErrors( $validator )
			                 ->withInput();
		}

		$post->update( $input );

		return redirect()->route( 'posts.index' );
	}

	public function destroy($id) {
		$holiday = Post::withTrashed()->find($id);

		if ($holiday->trashed()) {
			$holiday->restore();
		} else {
			$holiday->delete();
		}

		return redirect()->back();
	}

}
