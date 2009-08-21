<?php

	require_once "../tractis_identity.php";
	
	echo "<h1>Welcome to the test php site </h1>";
	
	// Calculate your url (to the notification callback)
	$notification_callback = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	
	// Get an api_key: http://www.tractis.com/identity
	// tractis_identity contructor class (api_key, notification_callback, public_verification (true/false), image_button_url)
	$tractis_identity = new tractis_identity("Your API KEY HERE", $notification_callback, "false", "/your/url/to/images/trac_but_bg_lrg_b_en.png");
	
	echo $tractis_identity->show_form();
	
	// Check if a callback from Tractis if performed and the Authentication Response
	if ($user = $tractis_identity->check_auth())
	{
		// Own code to integrate in the auth mechanism or sessions, ...
		echo "The Tractis Auth has been performed, now the data needs to be integrated on your site. <br/><br/>";
		echo "Now you have in the \$user array the follow information:<br/><br/>";
		print_r($user);
	}
	else
	{
		echo "Not Tractis Auth, please click on the button and follow the intructions";
	}

?>
