<footer>
    <section class="footer-content">
        <i class="fab fa-facebook-square"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-twitter-square"></i>
        <i class="fab fa-linkedin"></i>
        <p>Made with <span>&hearts;</span> in London by Marco Valeri - &copy; <?= date('Y'); ?> - All rights reserved </p>
    </section>
</footer>

<?php
    /*
    * Call db_disconnect($db); that close the connection to the database
    * if it is open
    */
    db_disconnect($db);
?>