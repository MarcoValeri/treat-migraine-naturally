<?php 
    /*
    * Create a function that give a subtitle to the header seciont
    * If the variable has been not declare into a relateve file, it will have an empty string as value
    */
    if (!isset($header_sub_title)) {
        $header_sub_title = '';
    }
?>

<header>
    <nav>
        <ul>
            <li><a href="<?= url_for('/index.php') ?>">Home</a></li>
            <li><a href="<?= url_for('/pages/sign-up.php'); ?>">Sign Up</a></li>
        </ul>
    </nav>
    <section>
        <h1>Treat Migraine Naturally</h1>
        <h2><?= $header_sub_title; ?></h2>
    </section>
</header>