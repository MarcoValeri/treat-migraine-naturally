<?php
    /*
    * Create a function that returns the url
    * The function returns the parenth path of the file
    * The parameter specify the child path
    * @parameter string
    * @return string
    */
    function url_for($script_path) {
        // Add the leading '/' if not present
        if ($script_path[0] != '/') {
            $script_path = '/' . $script_path;
        }

        return WWW_ROOT . $script_path;
    }

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
?>