<?php

date_default_timezone_set('Asia/Kolkata');
error_reporting(0);

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

define('WEBCHECKINDAY','0');
if(WEBCHECKINDAY == '0') {
    $checkInTable = "tbl_agfa_checkin";
    $webtitle = "Web Check-in (AGFA 2024)";
    $memberButton = 'Check In';
    $localStorage = "checkinSuccessAGFA";
    $localStoragetext = "You\'ve successfully checked in to the AGFA 2024 Happy Event!";

}elseif(WEBCHECKINDAY == '1'){
    $checkInTable = "tbl_gca_day1";
    $webtitle = "Web Check-in (GCA Day 1)";
    $memberButton = 'Check In';
    $localStorage = "checkinSuccessDay1";
    $localStoragetext = "You\'ve successfully checked in to the GCA - Day 1 Happy Event!";

}elseif(WEBCHECKINDAY == '2'){
    $checkInTable = "tbl_gca_day2";
    $webtitle = "Web Check-in (GCA Day 2)";
    $memberButton = 'Check In';
    $localStorage = "checkinSuccessDay2";
    $localStoragetext = "You\'ve successfully checked in to the GCA - Day 2 Happy Event!";
    
}elseif(WEBCHECKINDAY == '3'){
    $checkInTable = "tbl_gca_cpd";
    $webtitle = "CPD Registration";
    $memberButton = 'Get CPD';
    $localStorage = "checkinSuccessCPD";
    $localStoragetext = "You\'ve successfully got the CPD it will take 2 days to reflect in your login. Thank you for attending GCA";
}
