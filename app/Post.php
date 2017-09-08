<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model {

	use SoftDeletes;

	protected $fillable = [ 'title', 'content' ];

	protected $dates = [ 'deleted_at' ];

	public static function boot() {
		parent::boot();

		static::creating( function ( $item ) {
			$item->author()->associate(Auth::user());
		} );
	}

	public function author() {
		return $this->belongsTo( 'App\\User', 'user_id' );
	}

	public function getExcerptAttribute() {
		return Str::words( $this->content, 10 );
	}

	public function getPublishedAtAttribute() {
		return $this->created_at->toFormattedDateString();
	}

}
