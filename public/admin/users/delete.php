<?php

// Require initialize.php and related code
require_once('../../../private/initialize.php');

// Called redirect_user(); that redirects to the login page 
// an authorized user
redirect_admin($_SESSION['email'], $_SESSION['admin'], url_for('/admin/admin.php'));

// Define the $id by the url and gets the $user by the db
// thanks to find_single_user(); function
$id = $_GET['id'] ?? '1';
$user = find_single_user($db, $id);

/*
* Validation form for delete an existing user
*/


// Create two outputs variables that interact with user admin
$output_confirm = "";
$output_delete = "
    <form action='./delete.php?id=${id}' method='post'>
        <input type='submit' name='delete' value='delete'>
    </form>
";


if (isset($_POST['delete'])) {
    $output_confirm = "
        <h3>Are you sure you want remove the user with email ${user['email']} from the user list?</h3>
        <form action='./delete.php?id=${id}' method='post'>
            <input type='submit' name='yes' value='yes'>
            <input type='submit' name='no' value='no'>
        </form>
    ";
}

if (isset($_POST['yes'])) {
    $output_confirm = "<h3>User has been deleted</h3>";
    delete_user($db, $id);
} else if (isset($_POST['no'])) {
    $output_confirm = "";
}




// Define a variable that gives the title to the page
$page_title = 'Delete User';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Delete User';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- 
    
Main 
Styled by _edit.scss

-->
<main class="edit-main">
    <section class="edit-main-user">
        <h2>User: <?= $user['email'] ?></h2>
        <table>
            <tr>
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Admin</th>
                <th>Delete</th>
            </tr>
            <tr>    
                <td><?= $user['id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['admin'] ?></td>
                <td><?= $output_delete ?></td>
            </tr>
        </table>
        <br />
        <?= $output_confirm ?>
        <br />
        <a href="<?= url_for('/admin/users/users.php'); ?>">&laquo; Back to Users List</a>
    </section>
<main>


<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>