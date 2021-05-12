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
    <nav class="header-navbar">
        <div class="header-navbar-menu-toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul class="header-navbar-menu-nav">
                <li><a class="<?php if (highlightNavMenu($_SERVER['SCRIPT_NAME'], "/treat-migraine-naturally/public/index.php")); ?>" href="<?= url_for('/index.php') ?>">Home</a></li>
                <li><a class="<?php if (highlightNavMenu($_SERVER['SCRIPT_NAME'], "/treat-migraine-naturally/public/pages/sign-up.php")); ?>" href="<?= url_for('/pages/sign-up.php'); ?>">Sign Up</a></li>
                <li><a class="<?php if (highlightNavMenu($_SERVER['SCRIPT_NAME'], "/treat-migraine-naturally/public/pages/login.php")); ?>" href="<?= url_for('/pages/login.php'); ?>">Login</a></li>
                <li><a class="<?php if (highlightNavMenu($_SERVER['SCRIPT_NAME'], "/treat-migraine-naturally/public/menu/menu.php")); ?>" href="<?= url_for('/menu/menu.php'); ?>">Menu</a></li>
                <li><a class="<?php if (highlightNavMenu($_SERVER['SCRIPT_NAME'], "/treat-migraine-naturally/public/pages/about-us.php")); ?>" href="<?= url_for('/pages/about-us.php'); ?>">About Us</a></li>
                <li><a class="<?php if (highlightNavMenu($_SERVER['SCRIPT_NAME'], "/treat-migraine-naturally/public/pages/contact.php")); ?>" href="<?= url_for('/pages/contact.php'); ?>">Contact</a></li>
                <li class="header-navbar-admin">
                    <?php
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] === "1") {
                            $admin = url_for('/admin/admin.php');
                            echo "<a href='${admin}'>Admin</a>";
                        }
                    ?>
                </li>
                <li class="header-navbar-admin">
                    <?php
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] === "1") {
                            $admin_menu = url_for('/admin/admin-menu.php');
                            echo "<a href='${admin_menu}'>Admin Menu</a>";
                        }
                    ?>
                </li>
                <li class="header-navbar-btn">
                    <?php
                        if (is_user_logged()) {
                            $redirect = url_for('/pages/logout.php');
                            echo "Hello " . $_SESSION['first_name'] . " ";
                            echo "<button class='header-navbar-btn-login'><a href='${redirect}'>Logout</a></button>";
                        } else {
                            $redirect = url_for('/pages/login.php');
                            echo "<button class='header-navbar-btn-logout'><a href='${redirect}'>Login</a></button>";
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <section class="header-headline">
        <h1>
            Treat Migraine 
            <br>Naturally
        </h1>
        <h2><?= $header_sub_title; ?></h2>
        <img src="http://localhost/treat-migraine-naturally/public/images/brain-purple.jpg" alt="logo">
    </section>
</header>