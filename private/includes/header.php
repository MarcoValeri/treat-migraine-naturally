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
    <nav class="header-navbar-one">
        <ul>
            <li><a href="<?= url_for('/index.php') ?>">Home</a></li>
            <li><a href="<?= url_for('/pages/sign-up.php'); ?>">Sign Up</a></li>
            <li><a href="<?= url_for('/pages/login.php'); ?>">Login</a></li>
            <li><a href="<?= url_for('/pages/about-us.php'); ?>">About Us</a></li>
            <li><a href="<?= url_for('/pages/contact.php'); ?>">Contact</a></li>
            <li><a href="<?= url_for('/menu/menu.php'); ?>">Menu</a></li>
            <li><a href="<?= url_for('/admin/admin.php'); ?>">Admin</a></li>
            <li><a href="<?= url_for('/admin/admin-menu.php'); ?>">Admin Menu</a></li>
        </ul>
        <nav class="header-navbar-two">
            <ul>
                <?php
                    if (is_user_logged()) {
                        $redirect = url_for('/pages/logout.php');
                        echo "<li>Hello " . $_SESSION['first_name'] . "</li>";
                        echo "<button><a href='${redirect}'>Logout</a></button>";
                    } else {
                        $redirect = url_for('/pages/login.php');
                        echo "<button><a href='${redirect}'>Login</a></button>";
                    }
                ?>
        </nav>
    </nav>
    <section class="header-headline">
        <h1>Treat Migraine Naturally</h1>
        <h2><?= $header_sub_title; ?></h2>
    </section>
</header>