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
    * The function gets a 
    * @parameter $connection that connects to the db and a
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
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }

    }

    /*
    * Create a function that check if email and password are associated
    * to an user
    * The function gets 
    * @parameter $connection that connects to the db
    * @parameter $email 
    * @parameter $password 
    * @return boolean true if $email and $password are
    * associated to the user
    * Otherwise return false
    */
    function check_user($connection, $email, $password) {

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (($row['email'] === $email) && ($row['password'] === $password)) {
                return TRUE;
            } else {
                return FALSE;
            }

        } else {
            return FALSE;
        }

    }

    /*
    * Create a function that gets
    * @parameter $connection that connects to the db
    * @parameter $email of the user and
    * @return string his/her name gitting it into db
    * This function allows to have the user name and stores
    * it on the session
    */
    function get_name($connection, $email) {

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $first_name = $row['first_name'];
            return $first_name;
        }

    }

    // Create a function that disconnects to the database
    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

?>