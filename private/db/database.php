<?php

    require('db_credentials.php');

    // Create a function that connects web application to the database
    function db_connect() {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $connection;
    }

    // Create a function that add new user to the database
    function add_new_user($connection, $first_name, $last_name, $email, $password) {

        $query = "INSERT INTO users (first_name, last_name, email, password) ";
        $query .= "VALUE ('$first_name', '$last_name', '$email', '$password')";

        if ($connection->query($query) === TRUE) {
            echo "New user created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $connection->error;
        }

    }

    /*
    * Create a function that checks into the db
    *  if an user is already registered
    * by his/her email
    * The functions gets a 
    * @parameter $connection that connect to the db and a
    * @parameter $email string that is the user's email and 
    * @return true if the user does not exist
    * otherwise return false
    */
    function is_new_user($connection, $email) {

        $query = "SELECT email FROM users WHERE email='$email'";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['email'] === $email) {
                echo $email . " already registered";
            } else {
                echo $email . " is new";
            }
        } else {
            echo $email . " is new";
        }

    }

    // Create a function that disconnects to the database
    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

?>