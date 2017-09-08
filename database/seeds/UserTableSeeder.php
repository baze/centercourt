<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table( 'users' )->truncate();

		User::create( [
			'name' => 'Björn Martensen',
			'email' => 'martensen@euw.de',
			'password' => Hash::make('f!7tRaba')
		] );

		User::create( [
				'name'     => 'Yvonne Brandt',
				'email'    => 'brandt@euw.de',
				'password' => Hash::make( 'f!7tRaba' )
		] );

		User::create( [
				'name'     => 'Laura Heuchemer',
				'email'    => 'laura.heuchemer@heuchemer.de',
				'password' => Hash::make( 'passwort' )
		] );

		User::create( [
				'name'     => 'Marion Duerrstein',
				'email'    => 'marion.duerrstein@heuchemer.de',
				'password' => Hash::make( 'XsN-sMK-XsX-43q' )
		] );

		User::create( [
				'name'     => 'Kerstin Patzig',
				'email'    => 'kerstin.patzig@heuchemer.de',
				'password' => Hash::make( 'JQs-87g-WSc-9vH' )
		] );

		User::create( [
			'name'     => 'Klaus Dieter Endler',
			'email'    => 'klausdieter6130@yahoo.com',
			'password' => Hash::make( 'RDK-X3U-8ve-o6e' )
		] );

//		User::create( [
//				'name'     => 'Jörg Walther',
//				'email'    => 'walther.joerg@gmx.de',
//				'password' => Hash::make( 'hJ4-dAX-8BD-fYQ' )
//		] );

	}

}
