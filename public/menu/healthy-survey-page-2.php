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
$valid = FALSE;

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a variable where saving the path to redirect the user
$redirect_next = '';

/*
* Create variables where saving data by the form
*/
$diabetes = '';
$food_allergies = '';
$sensitivity_to_foods = '';
$allergies_medications = '';
$notable_reactions_to_medications = '';
$medical_history_details = '';
$details = '';


// Check if the form has been submitted
if (isset($_POST['next3'])) {
    
    /*
    * Validate Details input
    * Details must be longer than 5 character
    * Details must be shorter than 500 character
    * Details should contain characters
    * number and special characgter
    */
    if (isset($_POST['medical_history_details'])) {
        $details_input = trim($_POST['medical_history_details']);
        $details_input = htmlentities($details_input);

        if ($details_input !== '') {

            if (strlen($details_input) > 5) {

                if (strlen($details_input) < 500) {
                    $details = $details_input;
                    $valid = true;
                } else {
                    $errors_output['Details'] = "should be shorter than 500 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Details'] = "should be longer than 5 characters";
                $valid = false;
            }

        } else {
            $errors_output['Details'] = "is required";
            $valid = false;
        }
    }

    // Create a statement that saves the checkbox inputs into proper variables
    // if the user select them
    if (isset($_POST['diabetes'])) {
        $diabetes_input = trim($_POST['diabetes']);
        $diabetes_input = htmlentities($diabetes_input);
        $diabetes = $diabetes_input;
    }

    if (isset($_POST['food_allergies'])) {
        $food_allergies_input = trim($_POST['food_allergies']);
        $food_allergies_input = htmlentities($food_allergies_input);
        $food_allergies = $food_allergies_input;
    }

    if (isset($_POST['sensitivity_to_foods'])) {
        $sensitivity_to_foods_input = trim($_POST['sensitivity_to_foods']);
        $sensitivity_to_foods_input = htmlentities($sensitivity_to_foods_input);
        $sensitivity_to_foods = $sensitivity_to_foods_input;
    }

    if (isset($_POST['allergies_medications'])) {
        $allergies_medications_input = trim($_POST['allergies_medications']);
        $allergies_medications_input = htmlentities($allergies_medications_input);
        $allergies_medications = $allergies_medications_input;
    }

    if (isset($_POST['notable_reactions_to_medications'])) {
        $notable_reactions_to_medications_input = trim($_POST['notable_reactions_to_medications']);
        $notable_reactions_to_medications_input = htmlentities($notable_reactions_to_medications_input);
        $notable_reactions_to_medications = $notable_reactions_to_medications_input;
    }

} 

/*
* Create a statement that redirects user to the
* next form page if all fields are valide
*/
if ($valid && count($errors_output) === 0) {
    $_SESSION['diabetes'] = $diabetes === '' ? "no" : "yes";
    $_SESSION['food_allergies'] = $food_allergies === '' ? "no" : "yes";
    $_SESSION['sensitivity_to_foods'] = $sensitivity_to_foods === '' ? "no" : "yes";
    $_SESSION['allergies_medications'] = $allergies_medications === '' ? "no" : "yes";
    $_SESSION['notable_reactions_to_medications'] = $notable_reactions_to_medications === '' ? "no" : "yes";
    $_SESSION['medical_history_details'] = $details;
    $redirect_next = './healthy-survey-page-3.php';
    redirect_to('./healthy-survey-page-3.php');
} else {
    $redirect_next = './healthy-survey-page-2.php';
}


// Define a variable that gives the title to the page
$page_title = 'Healthy Survey Page 2';

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
    <h2>Medical History</h2>
    <form action="<?= $redirect_next; ?>" method="post">
        <h4>Do you have:</h4>
        <input id="diabetes" name="diabetes" type="checkbox" value="diabetes">
        <label for="diabetes">Diabetes</label>
        <br />
        <input id="food_allergies" name="food_allergies" type="checkbox" value="food_allergies">
        <label for="food_allergies">Food allergies</label>
        <br />
        <input id="sensitivity_to_foods" name="sensitivity_to_foods" type="checkbox" value="sensitivity_to_foods">
        <label for="sensitivity_to_foods">Sensitivity to foods</label>
        <br />
        <input id="allergies_medications" name="allergies_medications" type="checkbox" value="allergies_medications">
        <label for="allergies_medications">Allergies to any medications</label>
        <br />
        <input id="notable_reactions_to_medications" name="notable_reactions_to_medications" type="checkbox" value="notable_reactions_to_medications">
        <label for="notable_reactions_to_medications">Notable reactions to medications</label>
        <br />
        <label for="medical_history_details">Please give details</label>
        <br />
        <textarea id="medical_history_details" name="medical_history_details" rows="4" cols="50"></textarea>
        <br />
        <button><a href="<?= url_for('/menu/healthy-survey-page-1.php'); ?>">Back</a></button>
        <input name='next3' type='Submit' value='Next'>
    </form>

    <section>
        <!-- Show errors if they exist -->
        <h4>Test errors:</h4>
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