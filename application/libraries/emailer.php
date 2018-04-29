<?php

require "./vendor/autoload.php";

use Mailgun\Mailgun;

class Emailer {

	public function send($subject, $message){

		# Instantiate the client.
		$mgClient = new Mailgun('key-3c123e0a5c67c56f17b70d50517e397f');
		$domain = "sandbox7e1e8cc953714273a441fdd9f0967239.mailgun.org";

		# Make the call to the client.
		$result = $mgClient->sendMessage($domain, array(
		    'from'    => 'MyShopping <postmaster@sandbox7e1e8cc953714273a441fdd9f0967239.mailgun.org>',
		    'to'      => 'Jason <newtonstudio@gmail.com>',
		    'subject' => $subject,
		    'text'    => $message
		));

	}

}
?>