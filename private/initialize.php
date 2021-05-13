<?php

    // Turn on output buffering
    ob_start();

    /*
    * Create file paths and assigns it to PHP constants
    * __FILE__ returns the current path to this file
    * dirname() returns the path to the parent directory
    */
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("INCLUDE_PATH", PRIVATE_PATH . '/includes');
    define("DB_PATH", PRIVATE_PATH . '/db');

    /*
    * Assign the root URL to a PHP constant
    * Do not need to include the domain
    * Use same document root as webserver
    * Can set a hardcoded value:
    * define ("WWW_ROOT", 'xampp732/htdocs/treat-migraine-naturally/public');
    * define ("WWW_ROOT", '');
    * Can dynamically find everything in URL up to "/public"
    */
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    // Require functions.php and related code
    require_once('functions.php');

    /* 
    * Require database.php and related code and save db_connect(); inside a variable
    * This allows to connect to the db by any page that call inizialize.php
    * I also added db_disconnect($db); into the footer.php so the database connection
    * will be close in any page that contains the footer if it is open
    */
    require_once(DB_PATH . '/database.php');
    $db = db_connect();

    /*
    * Require sessions.php and related code
    * I called function create_session(); that start the session
    * throughout all the page of the web application
    */
    require_once('sessions.php');
    create_session();

    /*
    * Require cookies.php and related code
    * I called function showCookiesBanner() so
    * if the user has not accepted the cookie policy
    * the banner will be displays on the header
    * User should accesses to the cookie policy
    * by a proper button on the footer
    */
    require_once('cookies.php');
    
?>