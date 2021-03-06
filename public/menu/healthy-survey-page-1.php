<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login.php'));

/*
* Validation form for healthy survey
*/

// Create a boolean variable with false value that 
// I will use to validate the form
$valid = false;

// Create an empty array where saving the errors if they exist
$errors_output = [];

/*
* Create variables where saving data by the form
*/
$title = '';
$surname = $_SESSION['last_name'] ?? '';
$email = $_SESSION['email'] ?? '';
$telephone = '';
$address_number = '';
$address = '';
$city = '';
$country = '';
$postcode = '';
$age = '';
$gender = '';
$occupation = '';


// Check if the form has been submitted
if (isset($POST['next2'])) {
    
    /*
    * Validate Title input
    * Title must be longer than 1 character
    * Title must be shorter than 20 character
    * Title must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['title'])) {
        $title_input = trim($_POST['title']);
        $title_input = htmlentities($title_input);

        if ($title_input !== '') {

            if (strlen($title_input) > 1) {

                if (strlen($title_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $title_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $title_input)) {
                            $title = $title_input;
                            $valid = true;
                        } else {
                            $errors_output['Title'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Title'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Title'] = "should be shorter than 20 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Title'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Title'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Surname input
    * Surname must be longer than 1 character
    * Surname must be shorter than 20 character
    * Surname must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['surname'])) {
        $surname_input = trim($_POST['surname']);
        $surname_input = htmlentities($surname_input);

        if ($surname_input !== '') {

            if (strlen($surname_input) > 1) {

                if (strlen($surname_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $surname_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $surname_input)) {
                            $surname = $surname_input;
                            $valid = true;
                        } else {
                            $errors_output['Surname'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Surname'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Surname'] = "should be shorter than 20 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Surname'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Surname'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Email input
    * Email must be a valid email address
    * To achieve this task I used built-in function filter_var()
    */
    if (isset($_POST['email'])) {
        $email_input = trim($_POST['email']);
        $email_input = htmlentities($email_input);

        if ($email_input !== '') {

            if (filter_var($email_input, FILTER_VALIDATE_EMAIL)) {
                $email = $email_input;
                $valid_user = true;
            } else {
                $errors_output['Email'] = "should be a valid email address";
                $valid_user = false;
            }

        } else {
            $errors_output['Email'] = "is required";
            $valid_user = false;
        }

    }

    /*
    * Validate Telephone input
    * Telephone must be longer than 5 digits
    * Telephone must be shorter than 15 digits
    * Telephone must contain just digits,
    * charancters and special character are not allowe
    * User can just use + for the prefix
    */
    if (isset($_POST['telephone'])) {
        $telephone_input = trim($_POST['telephone']);
        $telephone_input = htmlentities($telephone_input);

        if ($telephone_input !== '') {

            if (strlen($telephone_input) > 5) {

                if (strlen($telephone_input) < 15) {
                    $invalid_character = '/[a-z]/';

                    if (!preg_match($invalid_character, $telephone_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $telephone)) {
                            $telephone = $telephone_input;
                            $valid = true;
                        } else {
                            $errors_output['Telephone'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Telephone'] = "can not contain letters";
                        $valid = false;
                    }

                } else {
                    $errors_output['Telephone'] = "should be shorter than 15 characters";
                    $valid = false;
                }

            } else {
                $errors_output['Telephone'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Telephone'] = "is required";
            $valid = false;
        }
    }
    
}


// Define a variable that gives the title to the page
$page_title = 'Healthy Survey Page 1';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');


?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Healthy Survey';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- main --> 
<main>
    <form action="./healthy-survey-page-1.php" method="post">
        <label for='title'>Title</label>
        <input id='title' name='title' type='text' value='<?= $title ?>' placeholder='Title'>
        <br />
        <label for='surname'>Surname</label>
        <input id='surname' name='surname' type='text' value='<?= $surname ?>' placeholder='Surname'>
        <br />
        <label for='email'>Email</label>
        <input id='email' name='email' type='email' value='<?= $email ?>' placeholder='Email'>
        <br />
        <label for='telephone'>Telephone</label>
        <input id='telephone' name='telephone' type='text' value='<?= $telephone ?>' placeholder='Telephone'>
        <br />
        <label for='address_number'>Address Line 1</label>
        <input id='address_number' name='address_number' type='text' value='<?= $address_number ?>' placeholder='Number'>
        <br />
        <label for='address'>Address Line 2</label>
        <input id='address' name='address' type='text' value='<?= $address ?>' placeholder='Address'>
        <br />
        <label for='city'>Town or City</label>
        <input id='city' name='city' type='text' value='<?= $city ?>' placeholder='Town or City'>
        <br />
        <label for='country'>Country</label>
        <input id='country' name='country' type='text' value='<?= $country ?>' placeholder='Country'>
        <br />
        <label for='postcode'>Postal or Zip Code</label>
        <input id='postcode' name='postcode' type='text' value='<?= $postcode ?>' placeholder='Postal or Zip Code'>
        <br />
        <label for='age'>Age</label>
        <input id='age' name='age' type='text' value='<?= $age ?>' placeholder='Age'>
        <br />
        <label for='gender'>Gender</label>
        <input id='gender' name='gender' type='text' value='<?= $gender ?>' placeholder='Gender'>
        <br />
        <label for='occupation'>Occupation</label>
        <input id='occupation' name='occupation' type='text' value='<?= $occupation ?>' placeholder='Occupation'>
        <br />
        <input name='next2' type='submit' value='Next'>
    </form>

    <section>
        <!-- Show errors if they exist -->
        <ul>
        <?php
            foreach($errors_output as $key => $value) {
        ?>
                <li><?= "${key}: ${value}"; ?></li>
        <?php
            }
        ?>
    </section>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>