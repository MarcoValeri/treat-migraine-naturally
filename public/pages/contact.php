<?php

// Require initialize.php and relatd code
require_once('../../private/initialize.php');

/*
* Validation form for login
*/

// Create a boolean variable with false value
$valid = false;

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a empty variables where saving form input if they are valid
$name = '';
$email = '';
$message = '';

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    /* 
    * Validate Name input
    * Name must be longer than 1 character
    * Name must be shorter than 30 characters
    * Name must containt just characters,
    * number and special characters are not allowed
    */
    if (isset($_POST['name'])) {
        $name_input = trim($_POST['name']);
        $name_input = htmlentities($name_input);

        if ($name_input !== '') {

            if (strlen($name_input) > 1) {

                if (strlen($name_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $name_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $name_input)) {
                            $name = $name_input;
                            $valid = true;
                        } else {
                            $errors_output['Name'] = "can not contain special characters";
                            $valid = false;
                        }

                    } else {
                        $errors_output['Name'] = "can not contain numbers";
                        $valid = false;
                    }
    
                } else {
                    $errors_output['Name'] = "should be shorter than 30 characters";
                    $valid = false;
                }
    
            } else {
                $errors_output['Name'] = "should be longer than 1 character";
                $valid = false;
            }

        } else {
            $errors_output['Name'] = "is required";
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
    * Validate Message input
    * Message must be longer than 10 character
    * Message must be shorter than 500 characters
    */
    if (isset($_POST['message'])) {
        $message_input = trim($_POST['message']);
        $message_input = htmlentities($message_input);

        if ($message_input !== '') {

            if (strlen($message_input) > 10) {

                if (strlen($message_input) < 500) {
                    $message = $message_input;
                    $valid = TRUE;
                } else {
                    $errors_output['Message'] = "should be shorter than 500 characters";
                    $valid = FALSE;
                }
            } else {
                $errors_output['Message'] = "should be longer than 10 character";
                $valid = FALSE;
            }
        } else {
            $errors_output['Message'] = "is required";
            $valid = FALSE;
        }
    }

}

/*
* Save the form inside a variable which name is output
* If the contact fields are valid, the user will see
* a thanks message and the staff will recive an email
* with the message
*/
if ($valid && count($errors_output) === 0) {

    // Send the email with the message to a staff member
    $msg = wordwrap($message, 70);
    mail("info@marcovaleri.net", "Contact request by: " . $email, $msg);

    // Send the email to the user to confirm that his/her message
    // has been sent
    $user_msg = "Dear " . $name;
    $user_msg .= "\nThank you to contact the staff of Treat Migraine Naturally";
    $user_msg .= "\nA member of out staff will keep in touch with you soon.";
    $user_msg .= "\nKind Regards,";
    $user_msg .= "\nThe Staff of Treat Migraine Naturally";
    $user_msg .= "\n\n\n";
    $user_msg .= "------------------------------------";
    $user_msg .= "\nThis is a copy of your message:\n";
    $user_msg .= $msg;
    $copy_msg_for_user = wordwrap($user_msg, 70);
    mail($email, "Treat Migraine Naturally", $copy_msg_for_user);

    // Thanks message for the user
    $output = "<section class='contact-main-confim'><p>Thank you. Your message has been delivered.</p></section>";

} else {
    $output = "
        <form class='contact-main-form-gridcontainer' action='./contact.php' method='post'>
            <section class='contact-main-form-gridcontainer-name'>
                <label for='name'>Name *</label>
                <input id='name' name='name' type='text' value='${name}' placeholder='First Name'>
            </section>
            <section class='contact-main-form-gridcontainer-email'>
                <label for='email'>Email *</label>
                <input id='email' name='email' type='email' value='${email}' placeholder='Email'>
            </section>
            <section class='contact-main-form-gridcontainer-message'>
                <label for='message'>Message *</label>
                <textarea id='message' name='message' placeholder='Write your message...'></textarea>
            </section>
            <section class='contact-main-form-gridcontainer-submit'>
                <input name='submit' type='submit' value='Submit'>
            </section>
        </form>
";
}

// Define a variable that gives the title to the page
$page_title = 'Contact';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');
?>

</head>
<body>

<!-- Headers -->
<?php
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = "Contact";
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class="contact-main">
    <fieldset>
        <legend>Contact</legend>
        <section class="contact-main-error">
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

        <!-- Output -->
        <?= $output; ?>
    </fieldset>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>