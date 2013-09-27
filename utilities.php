<?php

/** Append a line of text in voicemail.txt **/
function appendToVoiceMailFile($text) {
    appendToFile($text, 'voicemails.log');
}

function appendToCallRecordFile($text) {
    appendToFile($text, 'calls.log');
}

function appendToNotificationFile($text) {
    appendToFile($text, 'notifications.log');
}

function appendToFile($text, $filename = "others.log") {
    $fh = fopen($filename, 'a') or die("can't open file");
    fwrite($fh, $text . "\n");
    fclose($fh);
}

/** Verifying Notification **/
function computeHoiioSignature($payload, $accessToken) {
	// hash_hmac will return a hex of the digest
	$signature =hash_hmac('sha256', $payload, $accessToken);
	return $signature;
}


?>