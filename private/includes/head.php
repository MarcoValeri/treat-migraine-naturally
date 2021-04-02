<?php 
    /* Declare statements that saves page's title
    * If the variable does not exist, its value should be 'Treat Migraine Naturally'
    * If the variable exists, it should be the assigns value
    */
    if (!isset($page_title)) {
        $page_title = 'Treat Migraine Naturally';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?= url_for('/css/main.css'); ?>">

        <title><?= $page_title ?></title>

        <!-- Add Font Awesome -->
        <script src="https://kit.fontawesome.com/25e71e3313.js" crossorigin="anonymous"></script>

        <!--
        The tag <head> needs to close on any page that uses head.php
        This allow to add extra line of code before the close tag if needed
        -->
    