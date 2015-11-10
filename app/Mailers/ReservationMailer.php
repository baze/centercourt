<?php namespace App\Mailers;

use App\Reservation;

class ReservationMailer extends Mailer
{

    public function notifyAboutReservation( Reservation $reservation ) {

        $this->email   = 'martensen@euw.de';
        $this->to      = 'Björn Martensen';
        $this->view    = 'emails.reservation';
        $this->data = [ 'reservation' => $reservation ];
        $this->subject = 'Neue Reservierungsanfrage';

        $this->options = function ( $message ) {
            $message->from( 'socialmedia@euw.de', 'CC Demo App' );

            $message->bcc('bjoern.martensen@gmail.com', 'Björn Martensen');
        };

        return $this->deliver();
    }

} 