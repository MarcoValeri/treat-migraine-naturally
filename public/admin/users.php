<?php

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user(); that redirects to the login page 
// an authorized user
redirect_admin($_SESSION['email'], $_SESSION['admin'], url_for('/admin/admin.php'));

// Define a variable that gives the title to the page
$page_title = 'Users';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Admin Users';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<section>
    <h2>Add a new user</h2>
</sction>

<section>
    <h2>Treat Migraine Naturally users</h2>
    <table>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Admin</th>
        </tr>
        <?php 
            /*
            * Call the function find_users() that gets all data by the
            * users db and print them out into the table
            */
            $users = find_users($db);
            while($user = mysqli_fetch_assoc($users)) {
        ?>
        <tr>    
            <td><?= $user['id'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><?= $user['admin'] ?></td>
        </tr>
        <?php } ?>
    </table>
</section>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>