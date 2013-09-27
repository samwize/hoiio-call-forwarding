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

There are some configurations needed.

These MUST be changed:

	$HOIIO_APP_ID 		= "";		// Get from http://developer.hoiio.com
	$HOIIO_ACCESS_TOKEN = "";		// Get from http://developer.hoiio.com
	$HOIIO_NUMBER 		= "";		// Hoiio Number that you bought eg. +16501234567
	$THIS_SERVER_URL 	= "";		// Your server URL eg. http://www.example.com/myapp/auto-attendant.php

To get a Hoiio App ID, Access Token and Number, read the next section.

You must add you phone number that you want to forward to:

	$PHONE_TO_RING = "";


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

Call your Hoiio number and the phone should ring!




