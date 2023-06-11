<?php
    // session end
    session_start();
    session_destroy();
    // echo 'Success';
    header('Location: ../../login.php');
?>