<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReceivesEmailsColumnToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table( 'users', function ( Blueprint $table ) {
			$table->unsignedInteger( 'receives_emails' )->default(0);
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table( 'users', function ( Blueprint $table ) {
			$table->dropColumn( 'receives_emails' );
		} );
	}

}
