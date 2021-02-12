<?php

    require('db_credentials.php');

    // Create a function that connects web application to the database
    function db_connect() {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $connection;
    }

    // Create a function that disconnects to the database
    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

?>