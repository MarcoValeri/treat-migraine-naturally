<?php

    /*
    * Create a function that with session technology give
    * an id to the users that has been loggin
    * This allows to keep user loggin if it has
    * been logged begore
    */
    function create_session() {
        session_start();
        echo session_id();
    }

    /*
    * Create a function that save the first_name of the user
    * into $_SESSION superglobal array
    * @parameter string $first_name of the user
    * @return saves name into $_SESSION['first_name']
    */
    function create_session_name($first_name) {
        $_SESSION['first_name'] = $first_name;
        
        $test_name = $_SESSION['first_name'];
        echo $test_name;
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