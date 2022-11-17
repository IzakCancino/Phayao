<?php

    include "db.php";

    // Saving state and account values in session storage
    $_SESSION['state_message'] = 'Not logged';
    $_SESSION['user'] = [
        'id' => '',
        'name' => '',
        'lastName' => '',
        'phone' => '',
        'email' => '',
        'password' => ''
    ];

    // Return to main account page
    header("Location: ../tu-cuenta.php");

?>