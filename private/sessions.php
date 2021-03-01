<?php

    /*
    * Create a function that with session technology give
    * an id to the users that has been loggin
    * This allows to keep user loggin if it has
    * been logged begore
    */
    function create_session() {
        session_start();
    }

    /*
    * Create a function that saves the data of the user
    * into $_SESSION superglobal array
    * @parameter string $first_name, $last_name, $email of the user
    * @return saves name into $_SESSION['first_name']
    */
    function create_session_data($first_name, $last_name, $email, $admin) {
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = $admin;
    }

    /*
    * Create a function that check if the user has been loggin
    * by the session
    * If the user is logged function 
    * @return logout btn
    * oterwhise return login btn
    */
    function is_user_logged() {

        if (isset($_SESSION['first_name'])) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    /*
    * Create a function that destroys the session
    * @parameter no one
    * return destroys session
    */
    function destroy_current_session() {
        return session_destroy();
    }

?>