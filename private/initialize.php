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

    /*
    * Assign the root URL to a PHP constant
    * Do not need to include the domain
    * Use same document root as webserver
    * Can set a hardcoded value:
    * define ("WWW_ROOT", 'xampp732/htdocs/treat-migraine-naturally/publiv');
    * define ("WWW_ROOT", '');
    * Can dynamically find everything in URL up to "/public"
    */
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    // Require functions.php and related code
    require_once('functions.php');

?>