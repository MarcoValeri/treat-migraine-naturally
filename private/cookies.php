<?php

    /*
    * Create a function that allows to set the cookies
    * @parameter $policy is a string that set the name of the cookie
    * @parameter $value is a string that set the value of the cookie
    */
    function setCookiePolicy($policy, $value) {
        setcookie($policy, $value, time() + (7 * 24 * 60 * 60));
    }

    /*
    * Create a function that destroys the cookies 
    * @parameter $policy is a string that set the name of the cookie
    */
    function destroyCookies($policy) {
        $yesterday = time() - (24 * 60 * 60);
        setcookie($policy, '', $yesterday);
    }

?>