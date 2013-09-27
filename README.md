Hoiio Call Forwarding
=====================

Hoiio Call Forwarding is a telephony service that automatically forward calls received on a Hoiio phone number to 1 or more phone numbers.

This is how it works:

- Someone calls your Hoiio number
- 1 or more phone numbers will simultaneously ring
- When anyh of the phone picks up the call, the rest will stop ringing


Requirements
-------------

- PHP Web Server
- [Hoiio Developer Account](http://developer.hoiio.com/)


Setup
------

Clone this project:

	git clone https://github.com/samwize/hoiio-call-forwarding.git

Download [Hoiio PHP SDK](https://github.com/Hoiio/hoiio-php/zipball/master), unzip it, rename to `php-hoiio`, and place it in the project root folder. 

Rename `config-sample.php` to `config.php`. This file contains the Hoiio account information and also the application configurations such as the phone number(s) to forward to. The next section will explain how you can configure the application.

You should have the following structure.
	
	myapp/
	├── php-hoiio/				(Hoiio SDK)
	├── call-forwarding.php 	(The app)
	├── config.php 				(App Config)
	├── .gitignore
	├── README.md



Configure config.php
---------------------

There are various configurations.

These MUST be changed:

	$HOIIO_APP_ID 		= "";		// Get from http://developer.hoiio.com
	$HOIIO_ACCESS_TOKEN = "";		// Get from http://developer.hoiio.com
	$HOIIO_NUMBER 		= "";		// Hoiio Number that you bought eg. +16501234567
	$MY_MOBILE_NUMBER 	= "";		// Your personal mobile number eg. +16501234567
	$THIS_SERVER_URL 	= "";		// Your server URL eg. http://www.example.com/myapp/auto-attendant.php

To get a Hoiio App ID, Access Token and Number, read the next section.

You will probably also want to change the voice menu. It is a simple dictionary with the 'key' as **keypad response**, and the 'value' is a 2-element array containing the **action** (such as phone number to transfer to) and the **text to read out**.

The default voice menu:

	$directory = array(
		'1'=>array($MY_MOBILE_NUMBER,	"to reach " . $MY_NAME . "'s office phone"),
		'2'=>array($MY_MOBILE_NUMBER,	"to reach " . $MY_NAME . "'s mobile phone"),
		'3'=>array('SMSALERT',			"to send " . $MY_NAME . " an SMS, and he will call you back"),
		'4'=>array('VOICEMAIL',			"to leave " . $MY_NAME . " a voice mail message"),
	);

For example, it will read out "Press 1 to reach Junda's office phone.", and if the caller press 1 on the keypad, then it will be transferred to the mobile number. You many change the text and numbers as you like, or add more keys. 


Hoiio Account
--------------

You need to register a Hoiio Account at [http://developer.hoiio.com/](http://developer.hoiio.com/). 

With an account, login to Hoiio, create an app and note down the Hoiio App ID and Access Token.

Then go to Numbers and purchase a number of your choice. 

Configure the number and change the **Voice Notify URL** to your server script URL eg. http://www.example.com/myapp/auto-attendant.php

Note: A free Hoiio account has trial restrictions. You would need to top up Hoiio credits to lift the trial.


Deploy
-------

Upload the project folder to any PHP web server.

Call your Hoiio number and you should hear the voice menu!




