<footer>
    <p>Made with <span>&hearts;</span> in London by Marco Valeri - &copy; <?= date('Y'); ?> - All rights reserved </p>
</footer>

<?php
    /*
    * Call db_disconnect($db); that close the connection to the database
    * if it is open
    */
    db_disconnect($db);
?>