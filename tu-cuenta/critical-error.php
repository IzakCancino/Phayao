<?php

    /**
     * In case of a critical error, save the message, return to main account page, and die the programme
     * @param string $msg The error message
     * @param string $exits Indicate the start of the root to main page, and if is necessary the exit of folders. Predeterminate value: `"../"`
     * @return void No value
     */
    function criticalError ($msg, $exits = "../") {
        $_SESSION['error_message'] = $msg;
        header("Location: " . $exits . "tu-cuenta.php");
        die($msg);
    }

?>