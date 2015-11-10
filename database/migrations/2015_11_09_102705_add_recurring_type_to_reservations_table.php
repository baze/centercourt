<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddRecurringTypeToReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table( 'reservations', function ( Blueprint $table ) {
			$table->string( 'recurring_type' )->nullable();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table( 'reservations', function ( Blueprint $table ) {
			$table->dropColumn( 'recurring_type' );
		} );
	}

}
