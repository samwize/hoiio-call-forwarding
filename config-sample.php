<?php

// Important information. Change as needed.
$HOIIO_APP_ID       = "";   // Get from http://developer.hoiio.com
$HOIIO_ACCESS_TOKEN = "";   // Get from http://developer.hoiio.com
$HOIIO_NUMBER       = "";   // Hoiio Number that you bought eg. +16501234567
$THIS_SERVER_URL    = "";	// Your server URL eg. http://www.example.com/myapp/auto-attendant.php

// The phone number to ring
$PHONE_TO_RING = "";

// This is the message to play before the call is forwarded
$TEXT_BEFORE_TRANSFER	= "Please wait while we transfer your call..";
$TEXT_TRANSFER_FAILED	= "Sorry, we could not transfer the call.";

// This is the caller ID that will be shown to the ringing phone
// You can set to "from" (which is the original caller), "private", or any of your Hoiio numbers. 
// http://developer.hoiio.com/docs/ivr_transfer.html
$CALLER_ID    		= "from";

?>