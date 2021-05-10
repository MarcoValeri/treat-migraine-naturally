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

    /*
    * Create a function that redirects to a specific page
    * if a $value is false and $admin is false too
    * @parameter $value that when is false admin must be redirect
    * @parameter $admin that when is false admin must be redirect
    * @url url where the user will be redirect
    * return exit so the following code will note executed
    */
    function redirect_admin($value, $admin, $url) {

        if (!$value && !$admin) {
            header("Location: " . $url);
            exit;
        } else if ($admin === "0") {
            header("Location: " . $url);
            exit;
        }

    }

    /*
    * Create a function that set the redirect
    * and exit to the current page
    */
    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }

    /*
    * Create a function that allows to hightlight the navbar menu
    * when the user is browsing on a proper page
    * The function does it comparing two parameters
    * @parameter String filePath
    * @parameter String navMenuPath
    * @prints String "header-navbar-heighlight" that call css class
    * to add style
    */
    function highlightNavMenu($filePath, $navMenuPath) {
        if ($filePath == $navMenuPath) {
            echo "header-navbar-heighlight";
        }
    }
?>