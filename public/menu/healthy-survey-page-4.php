<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login.php'));

echo "Test";
echo "<pre>";
print_r($_SESSION);

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


// Check if the form has been submitted
if (isset($_POST['end'])) {
    
    /*
    * Validate Suffered From Migraine checkbox
    * Suffered From Migraine is required
    */
    if (isset($_POST['suffered-from-migraine'])) {
        $suffered_from_migraine_input = trim($_POST['suffered-from-migraine']);
        $suffered_from_migraine_input = htmlentities($suffered_from_migraine_input);

        if ($suffered_from_migraine_input !== '') {
            $suffered_from_migraine = $suffered_from_migraine_input;
            $valid = TRUE;
        } else {
            $errors_output['suffered-from-migraine'] = "is required";
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
    $redirect_next = './healthy-survey-page-4.php'; 
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
        <input id="tobacco-yes" name="tobacco-yes" type="checkbox" value="tobacco-yes">
        <label for="tobacco-yes">Yes</label>
        <br />
        <input id="tobacco-no" name="tobacco-no" type="checkbox" value="tobacco-no">
        <label for="tobacco-no">No</label>
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