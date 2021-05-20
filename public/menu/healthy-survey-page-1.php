<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login'));

/*
* Validation form for healthy survey
*/

// Create a boolean variable with false value that 
// I will use to validate the form
$valid = FALSE;

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a variable where saving the path to redirect the user
$redirect_next = '';

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
if (isset($_POST['next2'])) {
    
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

                        if (!preg_match($invalid_character, $telephone_input)) {
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

    /*
    * Validate Address Line 1 input
    * Address Line 1 must be longer than 1 character
    * Address Line 1 must be shorter than 20 character
    * Address Line 1 must contain just characters
    * and numbers
    * Special characgter are not allowed
    */
    if (isset($_POST['address_number'])) {
        $address_number_input = trim($_POST['address_number']);
        $address_number_input = htmlentities($address_number_input);

        if ($address_number_input !== '') {

            if (strlen($address_number_input) > 0) {

                if (strlen($address_number_input) < 20) {
                    $invalid_character = '/[@#~!£$%^&*-]/';

                    if (!preg_match($invalid_character, $address_number_input)) {
                        $address_number = $address_number_input;
                        $valid = true;
                    } else {
                        $errors_output['Number'] = "can not contain special characters";
                        $valid = false;
                    }
        
                } else {
                    $errors_output['Number'] = "should be longer than 1 character";
                    $valid = false;
                }
            
            } else {
                $errors_output['Number'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Number'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Address input
    * Address must be longer than 1 character
    * Address must be shorter than 20 character
    * Address must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['address'])) {
        $address_input = trim($_POST['address']);
        $address_input = htmlentities($address_input);

        if ($address_input !== '') {

            if (strlen($address_input) > 1) {

                if (strlen($address_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $address_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $address_input)) {
                            $address = $address_input;
                            $valid = true;
                        } else {
                            $errors_output['Address'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Address'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Address'] = "should be shorter than 20 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Address'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Address'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate City input
    * City must be longer than 1 character
    * City must be shorter than 20 character
    * City must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['city'])) {
        $city_input = trim($_POST['city']);
        $city_input = htmlentities($city_input);

        if ($city_input !== '') {

            if (strlen($city_input) > 1) {

                if (strlen($city_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $city_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $city_input)) {
                            $city = $city_input;
                            $valid = true;
                        } else {
                            $errors_output['City'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['City'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['City'] = "should be shorter than 20 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['City'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['City'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Country input
    * Country must be longer than 1 character
    * Country must be shorter than 20 character
    * Country must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['country'])) {
        $country_input = trim($_POST['country']);
        $country_input = htmlentities($country_input);

        if ($country_input !== '') {

            if (strlen($country_input) > 1) {

                if (strlen($country_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $country_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $country_input)) {
                            $country = $country_input;
                            $valid = true;
                        } else {
                            $errors_output['Country'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Country'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Country'] = "should be shorter than 20 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Country'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Country'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Postcode input
    * Postcode must be longer than 1 character
    * Postcode must be shorter than 10 character
    * Postcode must contain just characters and number
    * Special characgter are not allowed
    */
    if (isset($_POST['postcode'])) {
        $postcode_input = trim($_POST['postcode']);
        $postcode_input = htmlentities($postcode_input);

        if ($postcode_input !== '') {

            if (strlen($postcode_input) > 1) {

                if (strlen($postcode_input) < 20) {
                    $invalid_character = '/[@#~!£$%^&*-]/';

                    if (!preg_match($invalid_character, $postcode_input)) {
                        $postcode = $postcode_input;
                        $valid = true;
                    } else {
                        $errors_output['Postcode'] = "can not contain special characters";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Postcode'] = "should be longer than 1 character";
                    $valid = false;
                }

        } else {
            $errors_output['Postcode'] = "should be longer than 1 character";
            $valid = false;
        }

        } else {
            $errors_output['Postcode'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Age input
    * Age must be longer than 1 digits
    * Age must be shorter than 3 digits
    * Age must contain just digits,
    * charancters and special character are not allowe
    */
    if (isset($_POST['age'])) {
        $age_input = trim($_POST['age']);
        $age_input = htmlentities($age_input);

        if ($age_input !== '') {

            if (strlen($age_input) > 1) {

                if (strlen($age_input) < 4) {
                    $invalid_character = '/[a-z]/';

                    if (!preg_match($invalid_character, $age_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $age_input)) {
                            $age = $age_input;
                            $valid = true;
                        } else {
                            $errors_output['Age'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Age'] = "can not contain letters";
                        $valid = false;
                    }

                } else {
                    $errors_output['Age'] = "should be shorter than 4 characters";
                    $valid = false;
                }

            } else {
                $errors_output['Age'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Age'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Gender input
    * Gender must be longer than 1 character
    * Gender must be shorter than 20 character
    * Gender must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['gender'])) {
        $gender_input = trim($_POST['gender']);
        $gender_input = htmlentities($gender_input);

        if ($gender_input !== '') {

            if (strlen($gender_input) > 1) {

                if (strlen($gender_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $gender_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $gender_input)) {
                            $gender = $gender_input;
                            $valid = true;
                        } else {
                            $errors_output['Gender'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Gender'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Gender'] = "should be shorter than 20 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Gender'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Gender'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Occupation input
    * Occupation must be longer than 1 character
    * Occupation must be shorter than 30 character
    * Occupation must contain just characters
    * number and special characgter are not allowed
    */
    if (isset($_POST['occupation'])) {
        $occupation_input = trim($_POST['occupation']);
        $occupation_input = htmlentities($occupation_input);

        if ($occupation_input !== '') {

            if (strlen($occupation_input) > 1) {

                if (strlen($occupation_input) < 30) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $occupation_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $occupation_input)) {
                            $occupation = $occupation_input;
                            $valid = true;
                        } else {
                            $errors_output['Occupation'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Occupation'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Occupation'] = "should be shorter than 30 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Occupation'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Occupation'] = "is required";
            $valid = false;
        }
    }

} 

/*
* Create a statement that redirects user to the
* next form page if all fields are valide
*/
if ($valid && count($errors_output) === 0) {
    $_SESSION['title'] = $title;
    $_SESSION['last_name'] = $surname;
    $_SESSION['email'] = $email;
    $_SESSION['telephone'] = $telephone;
    $_SESSION['address_number'] = $address_number;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['country'] = $country;
    $_SESSION['postcode'] = $postcode;
    $_SESSION['age'] = $age;
    $_SESSION['gender'] = $gender;
    $_SESSION['occupation'] = $occupation;
    $redirect_next = './healthy-survey-page-2';
    redirect_to('./healthy-survey-page-2');
} else {
    $redirect_next = './healthy-survey-page-1';
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
<main class="healthy-main-page-one">
    <fieldset>
        <legend>Page 1 of 4</legend>
        <section class="healthy-main-page-one-error">
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
        <section class="healthy-main-page-one-title">
            <h2>Patient Details</h2>
        </section>
        <form class="healthy-main-page-one-form-gridcontainer" action="<?= $redirect_next; ?>" method="post">
            <section class="healthy-main-page-one-form-gridcontainer-personal-title">
                <label for='title'>Title</label>
                <input id='title' name='title' type='text' value='<?= $title ?>' placeholder='Title'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-surname">
                <label for='surname'>Surname</label>
                <input id='surname' name='surname' type='text' value='<?= $surname ?>' placeholder='Surname'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-email">
                <label for='email'>Email</label>
                <input id='email' name='email' type='email' value='<?= $email ?>' placeholder='Email'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-telephone">
                <label for='telephone'>Telephone</label>
                <input id='telephone' name='telephone' type='text' value='<?= $telephone ?>' placeholder='Telephone'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-address-line-one">
                <label for='address_number'>House Number</label>
                <input id='address_number' name='address_number' type='text' value='<?= $address_number ?>' placeholder='Number'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-address-line-two">
                <label for='address'>Address</label>
                <input id='address' name='address' type='text' value='<?= $address ?>' placeholder='Address'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-city">
                <label for='city'>Town or City</label>
                <input id='city' name='city' type='text' value='<?= $city ?>' placeholder='Town or City'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-country">
                <label for='country'>Country</label>
                <input id='country' name='country' type='text' value='<?= $country ?>' placeholder='Country'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-postcode">
                <label for='postcode'>Postal or Zip Code</label>
                <input id='postcode' name='postcode' type='text' value='<?= $postcode ?>' placeholder='Postal or Zip Code'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-age">
                <label for='age'>Age</label>
                <input id='age' name='age' type='text' value='<?= $age ?>' placeholder='Age'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-gender">
                <label for='gender'>Gender</label>
                <input id='gender' name='gender' type='text' value='<?= $gender ?>' placeholder='Gender'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-occupation">
                <label for='occupation'>Occupation</label>
                <input id='occupation' name='occupation' type='text' value='<?= $occupation ?>' placeholder='Occupation'>
            </section>
            <section class="healthy-main-page-one-form-gridcontainer-personal-next">
                <input name='next2' type='Submit' value='Next'>
            </section>
        </form>
    </fieldset>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>