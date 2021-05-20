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
$current_illnesses_details = '';
$current_medications_details = '';


// Check if the form has been submitted
if (isset($_POST['next4'])) {
    
    /*
    * Validate Current Illnesses details input
    * Current Illnesses details must be longer than 5 character
    * Current Illnesses details must be shorter than 500 character
    * Current Illnesses details should contain characters
    * number and special characgter
    */
    if (isset($_POST['current_illnesses_details'])) {
        $current_illnesses_details_input = trim($_POST['current_illnesses_details']);
        $current_illnesses_details_input = htmlentities($current_illnesses_details_input);

        if ($current_illnesses_details_input !== '') {

            if (strlen($current_illnesses_details_input) > 5) {

                if (strlen($current_illnesses_details_input) < 500) {
                    $current_illnesses_details = $current_illnesses_details_input;
                    $valid = true;
                } else {
                    $errors_output['Current Illnesses details'] = "should be shorter than 500 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Current Illnesses details'] = "should be longer than 5 characters";
                $valid = false;
            }

        } else {
            $errors_output['Current Illnesses details'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Current medications details input
    * Current medications details must be longer than 5 character
    * Current medications details must be shorter than 500 character
    * Current medications details should contain characters
    * number and special characgter
    */
    if (isset($_POST['current_medications_details'])) {
        $current_medications_details_input = trim($_POST['current_medications_details']);
        $current_medications_details_input = htmlentities($current_medications_details_input);

        if ($current_medications_details_input !== '') {

            if (strlen($current_medications_details_input) > 5) {

                if (strlen($current_medications_details_input) < 500) {
                    $current_medications_details = $current_medications_details_input;
                    $valid = true;
                } else {
                    $errors_output['Current medications details'] = "should be shorter than 500 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Current medications details'] = "should be longer than 5 characters";
                $valid = false;
            }

        } else {
            $errors_output['Current medications details'] = "is required";
            $valid = false;
        }
    }

} 

/*
* Create a statement that redirects user to the
* next form page if all fields are valide
*/
if ($valid && count($errors_output) === 0) {
    $_SESSION['current_illnesses_details'] = $current_illnesses_details;
    $_SESSION['current_medications_details'] = $current_medications_details;
    $redirect_next = './healthy-survey-page-4';
    redirect_to('./healthy-survey-page-4');
} else {
    $redirect_next = './healthy-survey-page-3';
}


// Define a variable that gives the title to the page
$page_title = 'Healthy Survey Page 3';

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
<main class="healthy-main-page-three">
    <fieldset>
        <legend>Page 3 of 4</legend>

        <section class="healthy-main-page-three-error">
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
        
        <section class="healthy-main-page-three-title">
            <h2>Medical History</h2>
        </section>
        <form class="healthy-main-page-three-form-gridcontainer" action="<?= $redirect_next; ?>" method="post">
            <section class="healthy-main-page-three-form-gridcontainer-title">
                <h4>Current Medical Status:</h4>
            </section>
            <section class="healthy-main-page-three-form-gridcontainer-illnesses">
                <label for="current_illnesses_details">Please give details of any of current illnesses</label>
                <br />
                <textarea id="current_illnesses_details" name="current_illnesses_details" rows="4" cols="50"></textarea>
                <br />
            </section>
            <section class="healthy-main-page-three-form-gridcontainer-medications">
                <label for="current_medications_details">Please give details of any of current medications you are taking</label>
                <br />
                <textarea id="current_medications_details" name="current_medications_details" rows="4" cols="50"></textarea>
                <br />
            </section>
            <section class="healthy-main-page-three-form-gridcontainer-back">
                <button><a href="<?= url_for('/menu/healthy-survey-page-2.php'); ?>">Back</a></button>
            </section>
            <section class="healthy-main-page-three-form-gridcontainer-next">
                <input name='next4' type='Submit' value='Next'>
            </section>
        </form>
    <fieldset>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>