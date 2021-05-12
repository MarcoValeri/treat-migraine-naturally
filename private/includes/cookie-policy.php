<?php

// Validation cookie policy form

$output = "";

if (isset($_POST['accept'])) {
    setCookiePolicy("policy", "yes");
    $output = "Accept";
} else if (isset($_POST['reject'])) {
    destroyCookies("policy");
    $output = "Reject";
} else {
    $output = "
    <section id='banner' style='color: #fff;'>
        <h1>Cookie Policy</h1>
        <form action='' method='post'>
            <label for='accept'>Accept</label>
            <input id='accept' name='accept' type='submit' value='accept'>
            <label for='reject'>Reject</label>
            <input id='reject' name='reject' type='submit' value='reject'>
        </form>
    </section>
    ";
}


echo $output;

?>


<!-- <script src="<?= url_for('/scripts/cookies.js'); ?>"></script>
<section id="banner" style="color: #fff;">
    <h1>Cookie Policy</h1>
    <form action="" method="post">
        <label for="accept">Accept</label>
        <input id="accept" name="accept" type="submit" value="accept">
        <label for="reject">Reject</label>
        <input id="reject" name="reject" type="submit" value="reject">
    </form>
</section> -->