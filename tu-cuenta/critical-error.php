<?php

    /**
     * In case of a critical error, save the message, return to main account page, and die the programme
     * @param string $msg The error message
     * @return void No value
     */
    function criticalError ($msg) {
        $_SESSION['error_message'] = $msg;
        header("Location: ../tu-cuenta.php");
        die($msg);
    }

?>