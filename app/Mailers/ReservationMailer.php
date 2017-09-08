<?php namespace App\Mailers;

use App\Reservation;
use App\User;

class ReservationMailer extends Mailer
{

    public function notifyAboutReservation( Reservation $reservation ) {

	    $recipients = User::where( 'receives_emails', '=', 1 )->get();

	    $mailRecipients = [];

	    foreach ( $recipients as $recipient ) {
		    $mailRecipients[] = $recipient->email;
	    }

        $this->email   = 'martensen@euw.de';
        $this->to      = 'Björn Martensen';
        $this->view    = 'emails.reservation';
        $this->data = [ 'reservation' => $reservation ];
        $this->subject = 'Neue Reservierungsanfrage';

        $this->options = function ( $message ) use ( $mailRecipients ) {
            $message->from( 'reservations@app.centercourt-badems.de', 'Centercourt Bad Ems Reservierungen' );
	        $message->to( $mailRecipients );
//            $message->bcc('bjoern.martensen@gmail.com', 'Björn Martensen');
        };

        return $this->deliver();
    }

} 