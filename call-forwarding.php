<?php

////////////////////////////////////////////////////////////////////////////// 
// What does this script do?
// When someone calls your Hoiio Number, the script will forward to 1 or more phone number(s)
//
// IMPORTANT:
// Rename config-sample.php to config.php, and change the required info.
//////////////////////////////////////////////////////////////////////////////

// Configuration file
include 'config.php';
include 'utilities.php';
require 'php-hoiio/Services/HoiioService.php';

// Try-catch all to prevent server returning any error
try {

    // Setup Hoiio SDK
    $hoiio = new HoiioService($HOIIO_APP_ID, $HOIIO_ACCESS_TOKEN);

    // Log all Hoiio notifications
    $post_body = file_get_contents('php://input');
    appendToNotificationFile(date("[Y-m-d H:i:s] ") . $post_body);

    // Handle the call state
    $call_state = $_POST["call_state"];
    if ($call_state == "ringing") {
        // Forward the call
        $notify = $hoiio->parseIVRNotify($_POST);
        $session = $notify->getSession();
        $caller_id = $CALLER_ID;
        if ($CALLER_ID == "from")
        	$caller_id = $_POST["from"];
        $hoiio->ivrTransfer($session, $PHONE_TO_RING, $THIS_SERVER_URL, $TEXT_BEFORE_TRANSFER, $caller_id, '', 'continue');

    } else if ($call_state == "ended") {
        // Log the call
        $call_record = ">> " . $_POST["from"]. " to " . $_POST["to"] . " for " . $_POST["duration"] . " min [" . $_POST["date"] . "]. Cost: " . $_POST["debit"] . " " . $_POST["currency"];
        appendToCallRecordFile($call_record);

    } else {
        // Call is ongoing
        // The transferred has probably failed
        // We play a message and hangup
        if ($_POST['transfer_status'] != 'answered') {
            $notify = $hoiio->parseIVRNotify($_POST);
            $session = $notify->getSession();
            // If we could not transfer, we hangup
            $hoiio->ivrHangup($session, $THIS_SERVER_URL, $TEXT_TRANSFER_FAILED);
        }
    }


} catch(Exception $e) {
    appendToFile($e->getTraceAsString(), 'error.log');
}

?>