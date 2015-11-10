<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('court_id')->nullable();
			$table->foreign( 'court_id' )
			      ->references( 'id' )->on( 'courts' );

			$table->date('date');
			$table->float('start_time');
			$table->float('duration');
			$table->boolean('recurring')->default(false);

			$table->boolean('confirmed')->default(false);
			$table->string('reservation_number')->nullable()->unique();

			$table->string('first_name');
			$table->string('last_name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
