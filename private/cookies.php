<?php

    /*
    * Create a function that allows to set the cookies
    */
    function setCookiePolicy($policy, $value) {
        setcookie($policy, $value, time() + (7 * 24 * 60 * 60));
        echo $_COOKIE['policy'];
    }

    /*
    * Create a function that shows the cookies policy banner
    * if the user has not accepted it
    */
    function showCookiesBanner() {
        if (!isset($_COOKIE['policy'])) {
            include(INCLUDE_PATH . '/cookie-policy.php');
        }
    }

?>