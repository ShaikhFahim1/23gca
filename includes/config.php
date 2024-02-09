<?php

date_default_timezone_set('Asia/Kolkata');
error_reporting(E_ALL);

include "db_connection.php";


define('MAIL_HOST','smtp.office365.com');
define('MAIL_USERNAME','gca@actuariesindia.org');
define('MAIL_PASSWORD','Dox70527'); 
define('MAIL_FROMEMAIL','gca@actuariesindia.org');
define('MAIL_FROMNAME','Global Conference of Actuaries');
define('MAIL_PORT','587');

define('YOUR_CHECKIN_LATITUDE','19.0207136');
define('YOUR_CHECKIN_LONGITUDE','73.0190031');
define('RADIUS_DISTANCE','3000');


?>