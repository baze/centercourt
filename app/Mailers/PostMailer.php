<?php namespace App\Mailers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostMailer extends Mailer
{

    public function notifyAboutPost( Post $post ) {

	    $me = Auth::user();

	    $users      = User::where( 'receives_emails', '=', 1 )->get();
	    $recipients = $users->except( $me->id );

	    $mailRecipients = [];

	    foreach ($recipients as $recipient) {
	    	$mailRecipients[] = $recipient->email;
	    }

//	    $mailRecipients = ['martensen@euw.de', 'bjoern.martensen@gmail.com'];

	    $this->email   = 'martensen@euw.de';
	    $this->to      = 'Björn Martensen';
	    $this->view    = 'emails.post';
	    $this->data    = [ 'post' => $post ];
	    $this->subject = 'Neue Nachricht von ' . $post->author->name;

	    $this->options = function ( $message ) use ( $mailRecipients ) {
		    $message->from( 'posts@app.centercourt-badems.de', 'Centercourt Bad Ems Nachrichten' );
		    $message->to( $mailRecipients );
//            $message->bcc('bjoern.martensen@gmail.com', 'Björn Martensen');
	    };

	    return $this->deliver();


    }

} 