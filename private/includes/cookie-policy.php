<?php

// Validation cookie policy form

$output_cooke_policy = "";

/*
* Show the cookie policy banner if the user has not accepted it before
* or if the user select cookie policy bnt by the footer section
*/
if (!isset($_COOKIE['policy']) || isset($_POST['cookie_policy'])) {
    $output_cooke_policy = "
    <section id='banner' class='cookie-policy'>
        <h1>Cookie Policy</h1>
        <p>
            Let us know you agree to cookies.
            We use cookies to give you the best online experience.<br>
            Please let us know if you agree to all of these cookies.
        </p>
        <form action='' method='post'>
            <div class='cookie-policy-btn-wrap'>
                <div class='cookie-policy-btn'>
                    <input name='accept' type='submit' value='Accept'>
                </div>
            </div>
            <div class='cookie-policy-btn-wrap'>
                <div class='cookie-policy-btn'>
                    <input id='reject' name='reject' type='submit' value='Reject'>
                </div>
            </div>
        </form>
    </section>
    ";
} 

if (isset($_POST['accept'])) {
    setCookiePolicy("policy", "yes");
    $output_cooke_policy = "";
} else if (isset($_POST['reject'])) {
    destroyCookies("policy");
    $output_cooke_policy = "";
}


echo $output_cooke_policy;

?>