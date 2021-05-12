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
    * Create a function that shows the cookies policy banner
    * if the user has not accepted it
    */
    function showCookiesBanner() {
        if (!isset($_COOKIE['policy'])) {
            include(INCLUDE_PATH . '/cookie-policy.php');
            // echo '
            // <section style="color: #fff">
            //     <h1>Cookie Policy</h1>
            // </section>
            // ';
        } else {
            echo '
            <section style="color: #fff">
                <h1>No Policy</h1>
            </section>
            ';
        }
    }

    /*
    * Create a function that destroys the cookies 
    */
    function destroyCookies($policy) {
        $yesterday = time() - (24 * 60 * 60);
        setcookie($policy, '', $yesterday);
    }

?>