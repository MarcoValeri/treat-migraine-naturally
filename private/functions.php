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
?>