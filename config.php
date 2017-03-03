<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define("URL", "http://localhost:8888/Basic_MVC_PHP/");
define("LIBS", "libs/");

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// The sitewide hashkey, do not change this because its used for passwords!
//this is for general purpose
define('HASH_GENERAL_KEY','MisITuPtO2000');
//this is for password
define('HASH_PASSWORD_KEY','123012930123KASDLAKSDLAS@ADSKLASDKLASD');