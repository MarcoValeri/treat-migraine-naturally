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


// Define a variable that gives the title to the page
$page_title = 'Show User';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Show User';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<section>
    <h2>User: <?= $user['email'] ?></h2>
    <table>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Admin</th>
            <th>View</th>
        </tr>
        <tr>    
            <td><?= $user['id'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><?= $user['admin'] ?></td>
            <td><a href="<?= url_for('/admin/users/show.php?id=' . $user['id']); ?>">View</a><td>
        </tr>
    </table>
    <a href="<?= url_for('/admin/users/users.php'); ?>">&laquo; Back to Users List</a>
</section>


<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>