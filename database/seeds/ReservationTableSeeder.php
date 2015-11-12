<?php

use App\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ReservationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table( 'reservations' )->truncate();

		// Platz 1

		// Montag

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-10-05',
				'start_time'               => 10,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Drühl',
				'last_name'                => null,
				'end_date'                 => '2016-04-20',
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 2,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-09',
				'start_time'               => 12,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Günter',
				'last_name'                => 'Bröder, BW',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-09',
				'start_time'               => 15.5,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-09',
				'start_time'               => 17.5,
				'duration'                 => 1.5,
				'recurring'                => 1,
				'first_name'               => 'Thomas',
				'last_name'                => 'Schmidt',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-09',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Holger',
				'last_name'                => 'Haehner',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-09',
				'start_time'               => 20,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Breitling',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Dienstag

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-10',
				'start_time'               => 14,
				'duration'                 => 5,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-10',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Stork',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-10',
				'start_time'               => 20,
				'duration'                 => 1.5,
				'recurring'                => 1,
				'first_name'               => 'May, Lierschied',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 2,
				'recurring_type'           => 'privat',
		] );

		// Mittwoch

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-11',
				'start_time'               => 15,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-11',
				'start_time'               => 16,
				'duration'                 => 4,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-11',
				'start_time'               => 20,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'Herren',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Donnerstag

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-12',
				'start_time'               => 9,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Dtz.-Karte',
				'last_name'                => 'Knopp',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'dutzendkarte',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-12',
				'start_time'               => 14,
				'duration'                 => 4,
				'recurring'                => 1,
				'first_name'               => 'TC Eitelborn',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-12',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC BW privat',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-12',
				'start_time'               => 19,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Löwenstein',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Freitag

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-13',
				'start_time'               => 15,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-13',
				'start_time'               => 16,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-13',
				'start_time'               => 17,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-13',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Nuss, Kadenbach',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-13',
				'start_time'               => 19,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Schwarz',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Samstag

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-14',
				'start_time'               => 10,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'A. Specht/SV Arzbach',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Sonntag

		Reservation::create( [
				'court_id'                 => 1,
				'date'                     => '2015-11-15',
				'start_time'               => 13,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Laura Heuchemer',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );


		// Platz 2

		// Montag

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-09',
				'start_time'               => 12,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Günter',
				'last_name'                => 'Bröder, BW',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-09',
				'start_time'               => 17.5,
				'duration'                 => 1.5,
				'recurring'                => 1,
				'first_name'               => 'Dtz.K',
				'last_name'                => 'Oberender',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'dutzendkarte',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-10-12',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Gerharz, Arzbach',
				'last_name'                => 'Jo Braun',
				'end_date'                 => '2016-04-11',
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-09',
				'start_time'               => 20,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Dtz.K',
				'last_name'                => 'Jo Braun',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'dutzendkarte',
		] );

		// Dienstag

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-10',
				'start_time'               => 10,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'T C E Senioren',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-10',
				'start_time'               => 16,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-10',
				'start_time'               => 17,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Gebenroth/TV Kemm.',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-10',
				'start_time'               => 19,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Gajdosic (Lausberg)',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Mittwoch

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-11',
				'start_time'               => 17,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Mohr/SV Arzbach',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-10-14',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Pieroth/SV Arzbach',
				'last_name'                => null,
				'end_date'                 => '2016-04-13',
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-11',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Dtz-K.',
				'last_name'                => 'Renzel',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'dutzendkarte',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-11',
				'start_time'               => 20,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'Herren',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Donnerstag

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-12',
				'start_time'               => 15,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'TC Eitelborn',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-12',
				'start_time'               => 17,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-12',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Eitelborn',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-12',
				'start_time'               => 19,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Rittler',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Freitag

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-13',
				'start_time'               => 15.5,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Heuchemer-Klaue',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-13',
				'start_time'               => 18,
				'duration'                 => 1.5,
				'recurring'                => 1,
				'first_name'               => 'Dtz.-Karte',
				'last_name'                => 'Sturm',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'dutzendkarte',
		] );

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-13',
				'start_time'               => 19.5,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Damen TCBW',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Samstag

		// Sonntag

		Reservation::create( [
				'court_id'                 => 2,
				'date'                     => '2015-11-15',
				'start_time'               => 18,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'I T C S',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Platz 3

		// Montag

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-09',
				'start_time'               => 10,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Gerhard',
				'last_name'                => 'Lanio',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-09',
				'start_time'               => 12,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Günter',
				'last_name'                => 'Bröder, BW',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-10-12',
				'start_time'               => 17,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Breidling',
				'last_name'                => 'SV Arzbach',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-10-12',
				'start_time'               => 18,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'SV Arzbach',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-10-12',
				'start_time'               => 20,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Gerharz, Arzbach',
				'last_name'                => 'Jo Braun',
				'end_date'                 => '2016-04-11',
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Dienstag

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-10',
				'start_time'               => 10,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'T C E Senioren',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-10',
				'start_time'               => 15,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Leicher',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-10',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Tribull jun.',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-10',
				'start_time'               => 19,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'TC Miehlen/Friedrich',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Mittwoch

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-11',
				'start_time'               => 18,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Breitling',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Donnerstag

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-12',
				'start_time'               => 9.5,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Vallerien',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-12',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Ruscheinsky',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-12',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Senioren, TC BW',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-12',
				'start_time'               => 20,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Dtz.-Karte',
				'last_name'                => 'Sen. BW',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'dutzendkarte',
		] );

		// Freitag

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-13',
				'start_time'               => 17,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Heimann, Koblenz',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-13',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Specht, Thorsten',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-13',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Dr. Mädrich',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-10-09',
				'start_time'               => 20,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Künkler',
				'last_name'                => null,
				'end_date'                 => '2016-04-24',
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 2,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-10-16',
				'start_time'               => 20,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'Brunk',
				'last_name'                => null,
				'end_date'                 => '2016-04-17',
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 2,
				'recurring_type'           => 'privat',
		] );

		// Samstag

		Reservation::create( [
				'court_id'                 => 3,
				'date'                     => '2015-11-14',
				'start_time'               => 10,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Kadenbach',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Platz 4

		// Montag

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-10-12',
				'start_time'               => 13.5,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-10-12',
				'start_time'               => 14.5,
				'duration'                 => 4.5,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-10-12',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-10-12',
				'start_time'               => 20,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'Damen',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Dienstag

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-10',
				'start_time'               => 14,
				'duration'                 => 5.5,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-10',
				'start_time'               => 20,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Mittwoch

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-11',
				'start_time'               => 14,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-11',
				'start_time'               => 15,
				'duration'                 => 4,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-11',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Dieblich',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-11',
				'start_time'               => 20,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Swatek',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		// Donnerstag

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-12',
				'start_time'               => 18,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'Laura Heuchemer',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-12',
				'start_time'               => 19,
				'duration'                 => 2,
				'recurring'                => 1,
				'first_name'               => 'TC Eitelborn',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		// Freitag

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-13',
				'start_time'               => 14,
				'duration'                 => 2.5,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-13',
				'start_time'               => 16.5,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-13',
				'start_time'               => 17.5,
				'duration'                 => 1.5,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => null,
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'verein',
		] );

		Reservation::create( [
				'court_id'                 => 4,
				'date'                     => '2015-11-13',
				'start_time'               => 19,
				'duration'                 => 1,
				'recurring'                => 1,
				'first_name'               => 'TC Blau-Weiß',
				'last_name'                => 'privat',
				'end_date'                 => null,
				'recurring_interval'       => 'weekly',
				'recurring_interval_weeks' => 1,
				'recurring_type'           => 'privat',
		] );

	}

}
