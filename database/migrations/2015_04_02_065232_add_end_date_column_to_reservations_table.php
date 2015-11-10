<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEndDateColumnToReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reservations', function( Blueprint $table) {
			$table->date('end_date')->nullable();
			$table->string('recurring_interval')->nullable();
			$table->integer('recurring_interval_weeks')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table( 'reservations', function ( Blueprint $table ) {
			$table->dropColumn( 'end_date' );
			$table->dropColumn( 'recurring_interval' );
			$table->dropColumn( 'recurring_interval_weeks' );
		} );
	}

}
