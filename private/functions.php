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
    * Create a function that redirects to a specific page
    * if a $value is false
    * @parameter $value that when is false user must be redirect
    * @url url where the user will be redirect
    * return exit so the following code will note executed
    */
    function redirect_user($value, $url) {

        if (!$value) {
            header("Location: " . $url);
            exit;
        }

    }
?>