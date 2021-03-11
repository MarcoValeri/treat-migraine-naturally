<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login.php'));

/* DELETE BEFORE DEPLOY */
/* DELETE BEFORE DEPLOY */
/* DELETE BEFORE DEPLOY */
/* DELETE BEFORE DEPLOY */
/* DELETE BEFORE DEPLOY */
/* DELETE BEFORE DEPLOY */
// echo "Test";
// foreach ($_SESSION as $key => $value) {
//     echo "- " . $key . ": " . $value . "<br />";
// }

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
$suffered_from_migraine = '';
$migraine_type = '';
$migraine_duration = '';
$stages_your_migraines = '';
$migraine_symptoms = '';
$medications_taken = '';
$medication_side_effects = '';
$non_medical_treatments_used = '';
$known_migraine_triggers = '';
$diet = '';
$tabacco = '';
$alcohol = '';
$exercise = '';
$fitness_level = '';
$posture = '';


// Check if the form has been submitted
if (isset($_POST['end'])) {
    
    /*
    * Validate Suffered From Migraine dropdown
    * Suffered From Migraine is required
    */
    if (isset($_POST['suffered-from-migraine'])) {
        $suffered_from_migraine_input = trim($_POST['suffered-from-migraine']);
        $suffered_from_migraine_input = htmlentities($suffered_from_migraine_input);

        if ($suffered_from_migraine_input !== '') {
            $suffered_from_migraine = $suffered_from_migraine_input;
            $valid = TRUE;
        } else {
            $errors_output['How long have you suffered from migraine'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Migraine type dropdown
    * Migraine type is NOT required
    */
    if (isset($_POST['migraine-type'])) {
        $migraine_type_input = trim($_POST['migraine-type']);
        $migraine_type_input = htmlentities($migraine_type_input);

        if ($migraine_type_input !== '') {
            $migraine_type = $migraine_type_input;
            $valid = TRUE;
        } 

    }

    /*
    * Validate Migraine Duration dropdown
    * Migraine Duration is required
    */
    if (isset($_POST['migraine-duration'])) {
        $migraine_duration_input = trim($_POST['migraine-duration']);
        $migraine_duration_input = htmlentities($migraine_duration_input);

        if ($migraine_duration_input !== '') {
            $migraine_duration = $migraine_duration_input;
            $valid = TRUE;
        } else {
            $errors_output['Typical migraine duration'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Stages of Your Migraines dropdown
    * Stages of Your Migraines is required
    */
    if (isset($_POST['stages-your-migraines'])) {
        $stages_your_migraines_input = trim($_POST['stages-your-migraines']);
        $stages_your_migraines_input = htmlentities($stages_your_migraines_input);

        if ($stages_your_migraines_input !== '') {
            $stages_your_migraines = $stages_your_migraines_input;
            $valid = TRUE;
        } else {
            $errors_output['Typical stages of your migraines'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Migraine Symptoms dropdown
    * Migraine Symptoms is required
    */
    if (isset($_POST['migraine-symptoms'])) {
        $migraine_symptoms_input = trim($_POST['migraine-symptoms']);
        $migraine_symptoms_input = htmlentities($migraine_symptoms_input);

        if ($migraine_symptoms_input !== '') {
            $migraine_symptoms = $migraine_symptoms_input;
            $valid = TRUE;
        } else {
            $errors_output['Migraine Symptoms'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Medications taken dropdown
    * Medications taken is required
    */
    if (isset($_POST['medications-taken'])) {
        $medications_taken_input = trim($_POST['medications-taken']);
        $medications_taken_input = htmlentities($medications_taken_input);

        if ($medications_taken_input !== '') {
            $medications_taken = $medications_taken_input;
            $valid = TRUE;
        } else {
            $errors_output['Medications taken'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Medication side effects textarea
    * Medication side effects must be longer than 5 character
    * Medication side effects must be shorter than 500 character
    * Medication side effects should contain characters
    * number and special characgter
    */
    if (isset($_POST['medication-side-effects'])) {
        $medication_side_effects_input = trim($_POST['medication-side-effects']);
        $medication_side_effects_input = htmlentities($medication_side_effects_input);

        if ($medication_side_effects_input !== '') {

            if (strlen($medication_side_effects_input) > 5) {

                if (strlen($medication_side_effects_input) < 500) {
                    $medication_side_effects = $medication_side_effects_input;
                    $valid = true;
                } else {
                    $errors_output['Medication side effects'] = "should be shorter than 500 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Medication side effects'] = "should be longer than 5 characters";
                $valid = false;
            }

        } else {
            $errors_output['Medication side effects'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Non-medical treatments used dropdown
    * Non-medical treatments used taken is required
    */
    if (isset($_POST['non-medical-treatments-used'])) {
        $non_medical_treatments_used_input = trim($_POST['non-medical-treatments-used']);
        $non_medical_treatments_used_input = htmlentities($non_medical_treatments_used_input);

        if ($non_medical_treatments_used_input !== '') {
            $non_medical_treatments_used = $non_medical_treatments_used_input;
            $valid = TRUE;
        } else {
            $errors_output['Non-medical treatments used'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Known migraine triggers dropdown
    * Known migraine triggers is required
    */
    if (isset($_POST['known-migraine-triggers'])) {
        $known_migraine_triggers_input = trim($_POST['known-migraine-triggers']);
        $known_migraine_triggers_input = htmlentities($known_migraine_triggers_input);

        if ($known_migraine_triggers_input !== '') {
            $known_migraine_triggers = $known_migraine_triggers_input;
            $valid = TRUE;
        } else {
            $errors_output['Known migraine triggers'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Diet dropdown
    * Diet is required
    */
    if (isset($_POST['diet'])) {
        $diet_input = trim($_POST['diet']);
        $diet_input = htmlentities($diet_input);

        if ($diet_input !== '') {
            $diet = $diet_input;
            $valid = TRUE;
        } else {
            $errors_output['Diet'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Tobacco checkbox
    * Diet is required
    */
    if (isset($_POST['tabacco'])) {

        $tabacco_input = trim($_POST['tabacco']);
        $tabacco_input = htmlentities($tabacco_input);

        if ($tabacco_input !== '') {
            $tabacco = $tabacco_input;
            $valid = TRUE;
        } else {
            $errors_output['Tabacco'] = "is required";
            $valid = FALSE;
        }
    }

    /*
    * Validate Alcohol dropdown
    * Alcohol is required
    */
    if (isset($_POST['alcohol'])) {
        $alcohol_input = trim($_POST['alcohol']);
        $alcohol_input = htmlentities($alcohol_input);

        if ($alcohol_input !== '') {
            $alcohol = $alcohol_input;
            $valid = TRUE;
        } else {
            $errors_output['Alcohol'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Exercise dropdown
    * Exercise is required
    */
    if (isset($_POST['exercise'])) {
        $exercise_input = trim($_POST['exercise']);
        $exercise_input = htmlentities($exercise_input);

        if ($exercise_input !== '') {
            $exercise = $exercise_input;
            $valid = TRUE;
        } else {
            $errors_output['Exercise'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Fitness Level dropdown
    * Fitness Level is required
    */
    if (isset($_POST['fitness-level'])) {
        $fitness_level_input = trim($_POST['fitness-level']);
        $fitness_level_input = htmlentities($fitness_level_input);

        if ($fitness_level_input !== '') {
            $fitness_level = $fitness_level_input;
            $valid = TRUE;
        } else {
            $errors_output['Fitness Level'] = "is required";
            $valid = false;
        }
    }

    /*
    * Validate Posture dropdown
    * Posture is required
    */
    if (isset($_POST['posture'])) {
        $posture_input = trim($_POST['posture']);
        $posture_input = htmlentities($posture_input);

        if ($posture_input !== '') {
            $posture = $posture_input;
            $valid = TRUE;
        } else {
            $errors_output['Posture'] = "is required";
            $valid = false;
        }
    }

} 

/*
* Create a statement that redirects user to the
* next form page if all fields are valide
*/
if ($valid && count($errors_output) === 0) {
    $_SESSION['suffered-from-migraine'] = $suffered_from_migraine;
    $_SESSION['migraine-type'] = $migraine_type;
    $_SESSION['migraine-duration'] = $migraine_duration;
    $_SESSION['stages-your-migraines'] = $stages_your_migraines;
    $_SESSION['migraine-symptoms'] = $migraine_symptoms;
    $_SESSION['medications-taken'] = $medications_taken;
    $_SESSION['medication-side-effects'] = $medication_side_effects;
    $_SESSION['non-medical-treatments-used'] = $non_medical_treatments_used;
    $_SESSION['known-migraine-triggers'] = $known_migraine_triggers;
    $_SESSION['diet'] = $diet;
    $_SESSION['tabacco'] = $tabacco === 'yes' ? 'yes' : 'no';
    $_SESSION['alcohol'] = $alcohol;
    $_SESSION['exercise'] = $exercise;
    $_SESSION['fitness-level'] = $fitness_level;
    $_SESSION['posture'] = $posture;
    $redirect_next = './healthy-survey-page-thank-you.php'; 

    /*
    * Set up and send the email for a member of the staff
    * with the data extract by the survey
    */
    $email_staff = "info@marcovaleri.net";
    $obj = "Survey of " . $_SESSION['first_name'] . " " . $_SESSION['last_name'];
    $msg = "User " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " has submitted the Healthy Survey\n";
    $msg .= "Data:\n";
    $msg .= "\nTitle: " . $_SESSION['title'];
    $msg .= "\nName: " . $_SESSION['first_name'];
    $msg .= "\nSurname: " . $_SESSION['last_name'];
    $msg .= "\nEmail: " . $_SESSION['email'];
    $msg .= "\nTelephone: " . $_SESSION['address_number'];
    $msg .= "\n\nAddress: " . $_SESSION['address_number'] . ", ";
    $msg .=  $_SESSION['address'] . "\n" . $_SESSION['postcode'] . " - ";
    $msg .= $_SESSION['city'] . " - " . $_SESSION['country'];
    $msg .= "\n\nAge: " . $_SESSION['age'];
    $msg .= "\nGender: " . $_SESSION['gender'];
    $msg .= "\nOccupation: " . $_SESSION['occupation'];
    $msg .= "\n\nDiabetes: " . $_SESSION['diabetes'];
    $msg .= "\nFood allergies: " . $_SESSION['food_allergies'];
    $msg .= "\nSensitivity to foods: " . $_SESSION['sensitivity_to_foods'];
    $msg .= "\nAllergies medications: " . $_SESSION['allergies_medications'];
    $msg .= "\nNotable reactions to medications: " . $_SESSION['notable_reactions_to_medications'];
    $msg .= "\nMedical history details: " . $_SESSION['medical_history_details'];
    $msg .= "\n\nCurrent illnesses details: " . $_SESSION['current_illnesses_details'];
    $msg .= "\nCurrent medications details: " . $_SESSION['current_medications_details'];
    $msg .= "\n\nSuffered from migraine: " . $_SESSION['suffered-from-migraine'];
    $msg .= "\nMigraine-type: " . $_SESSION['migraine-type'];
    $msg .= "\nMigraine duration: " . $_SESSION['migraine-duration'];
    $msg .= "\nStages your migraines: " . $_SESSION['stages-your-migraines'];
    $msg .= "\nMigraine symptoms: " . $_SESSION['migraine-symptoms'];
    $msg .= "\nMedications taken: " . $_SESSION['medications-taken'];
    $msg .= "\n\nMedication side effects: " . $_SESSION['medication-side-effects'];
    $msg .= "\nNon medical treatments used: " . $_SESSION['non-medical-treatments-used'];
    $msg .= "\nKnown migraine triggers: " . $_SESSION['known-migraine-triggers'];
    $msg .= "\n\nDiet: " . $_SESSION['diet'];
    $msg .= "\nAlcohol: " . $_SESSION['alcohol'];
    $msg .= "\nExercise: " . $_SESSION['exercise'];
    $msg .= "\nFitness level: " . $_SESSION['fitness-level'];
    $msg .= "\nPosture: " . $_SESSION['posture'];
    $msg .= "\nTabacco: " . $_SESSION['tabacco'];

    mail($email_staff, $obj, $msg);
    echo "Send email";
    

} else {
    $redirect_next = './healthy-survey-page-4.php';
}


// Define a variable that gives the title to the page
$page_title = 'Healthy Survey Page 4';

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
    <h2>Patient Details</h2>
    <form action="<?= $redirect_next; ?>" method="post">
        <h4>Migraine History:</h4>
        <label for="suffered-from-migraine">How long have you suffered from migraine?</label>
        <select id="suffered-from-migraine" name="suffered-from-migraine">
            <option value="Less than a year">Less than a year</option>
            <option value="One to two years">One to two years</option>
            <option value="Two to five years">Two to five years</option>
            <option value="Five to ten years">Five to ten years</option>
            <option value="More than ten years">More than ten years</option>
        </select>
        <br />
        <label for="migraine-type">Migraine type (if known)?</label>
        <select id="migraine-type" name="migraine-type">
            <option value="I don't know">I don't know</option>
            <option value="Migraine without aura">Migraine without aura</option>
            <option value="Migraine with aura">Migraine with aura</option>
            <option value="Hemiplegic migraine">Hemiplegic migraine</option>
            <option value="Menstrual migraine">Menstrual migraine</option>
            <option value="Vestibular migraine">Vestibular migraine</option>
        </select>
        <br />
        <label for="migraine-duration">Typical migraine duration?</label>
        <select id="migraine-duration" name="migraine-duration">
            <option value="1 day">1 day</option>
            <option value="2 days">2 days</option>
            <option value="3 - 4 days">3 - 4 days</option>
            <option value="5 - 7 days">5 - 7 days</option>
            <option value="Longer than one week">Longer than one week</option>
        </select>
        <br />
        <label for="stages-your-migraines">Typical stages of your migraines</label>
        <select id="stages-your-migraines" name="stages-your-migraines">
            <option value="Just a pain phase">Just a pain phase</option>
            <option value="Warning phase followed by pain phase">Warning phase followed by pain phase</option>
            <option value="Warning phase followed by pain phase followed by hangover">Warning phase followed by pain phase followed by hangover</option>
            <option value="Pain phase followed by a hangover">Pain phase followed by a hangover</option>
        </select>
        <br />
        <label for="migraine-symptoms">Migraine Symptoms</label>
        <select id="migraine-symptoms" name="migraine-symptoms">
            <option value="Headache">Headache</option>
            <option value="Dizziness">Dizziness</option>
            <option value="Blurred vision">Blurred vision</option>
            <option value="Tingling skin">Tingling skin</option>
            <option value="Numbness">Numbness</option>
            <option value="Cravings">Cravings</option>
            <option value="Sensitivity to noise">Sensitivity to noise</option>
            <option value="Sensitivity to light">Sensitivity to light</option>
            <option value="Altered taste">Altered taste</option>
            <option value="Altered smell">Altered smell</option>
            <option value="Abdominal pain">Abdominal pain</option>
            <option value="Constipation">Constipation</option>
            <option value="Diarrhoea">Diarrhoea</option>
            <option value="Fatigue">Fatigue</option>
        </select>
        <br />
        <label for="medications-taken">Medications taken</label>
        <select id="medications-taken" name="medications-taken">
            <option value="Triptans">Triptans</option>
            <option value="Beta blockers">Beta blockers</option>
            <option value="Prescription painkillers">Prescription painkillers</option>
            <option value="Over the counter pain killers">Over the counter pain killers</option>
            <option value="Anti-depressants">Anti-depressants</option>
            <option value="Antiemetics">Antiemetics</option>
            <option value="Anti convulsants">Anti convulsants</option>
            <option value="Angiotensin Receptor Blockers/ACE inhibitors">Angiotensin Receptor Blockers/ACE inhibitors</option>
            <option value="Calcium Channel Blockers">Calcium Channel Blockers</option>
        </select>
        <br />
        <label for="medication-side-effects">
        <strong>Medication side effects</strong>
        <br />
        Describe any side effects and adverse reactions you have had to the medications you have taken for migraine
        </label>
        <br />
        <textarea id="medication-side-effects" name="medication-side-effects" rows="4" cols="50"></textarea>
        <br />
        <label for="non-medical-treatments-used">Non-medical treatments used</label>
        <select id="non-medical-treatments-used" name="non-medical-treatments-used">
            <option value="Acupuncture">Acupuncture</option>
            <option value="Massage">Massage</option>
            <option value="Supplements">Supplements</option>
            <option value="Herbs">Herbs</option>
            <option value="Cannabis">Cannabis</option>
            <option value="Caffeine">Caffeine</option>
        </select>
        <br />
        <label for="known-migraine-triggers">Known migraine triggers</label>
        <select id="known-migraine-triggers" name="known-migraine-triggers">
            <option value="Diet">Diet</option>
            <option value="Stress">Stress</option>
            <option value="Travel">Travel</option>
            <option value="Lighting">Lighting</option>
            <option value="Changes in weather">Changes in weather</option>
            <option value="Exercise">Exercise</option>
            <option value="Sex">Sex</option>
            <option value="Chemical-exposure">Chemical exposure</option>
        </select>
        <h4>Patient Lifestyle:</h4>
        <label for="diet">Diet</label>
        <select id="diet" name="diet">
            <option value="Very healthy">Very healthy</option>
            <option value="Healthy">Healthy</option>
            <option value="Not very healthy">Not very healthy</option>
        </select>
        <br />
        <p>Tobacco</p>
        <input id="tabacco" name="tabacco" type="checkbox" value="yes">
        <label for="tabacco">Yes</label>
        <br />
        <input id="tabacco" name="tabacco" type="checkbox" value="no">
        <label for="tabacco">No</label>
        <br />
        <label for="alcohol">Alcohol</label>
        <select id="alcohol" name="alcohol">
            <option value="None">None</option>
            <option value="In moderation">In moderation</option>
            <option value="Regular">Regular</option>
            <option value="Excessive">Excessive</option>
        </select>
        <br />
        <label for="exercise">Exercise</label>
        <select id="exercise" name="exercise">
            <option value="None">None</option>
            <option value="Very little">In Very little</option>
            <option value="Some">Some</option>
            <option value="A lot">A lot</option>
        </select>
        <br />
        <label for="fitness-level">Fitness Level</label>
        <select id="fitness-level" name="fitness-level">
            <option value="Not fit">Not fit</option>
            <option value="Quite fit">Quite fit</option>
            <option value="Fit">Fit</option>
            <option value="Very fit">Very fit</option>
        </select>
        <br />
        <label for="posture">Posture</label>
        <select id="posture" name="posture">
            <option value="No known issues with posture">No known issues with posture</option>
            <option value="Quite fit">Quite fit</option>
            <option value="Some issues with posture">Some issues with posture</option>
            <option value="Notable issues with posture">Notable issues with posture</option>
        </select>
        <br />
        <button><a href="<?= url_for('/menu/healthy-survey-page-3.php'); ?>">Back</a></button>
        <input name='end' type='submit' value='Submit'>
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