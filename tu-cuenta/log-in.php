<?php

    include "db.php";
    include "critical-error.php";

    // Restarting the state of error message
    $_SESSION['error_message'] = '';

    // Verification that the connection work
    if (!$connection) {
        criticalError('Error de conexión: ' . mysqli_connect_error());
    }
    echo 'Connected successfully<br/>';

    // Verification that all values has been sent from the form
    if (!isset($_POST["email"], $_POST["password"])) {
        criticalError('No se enviaron todos los datos necesarios');
    }

    // Getting the values from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Getting the profile data that match with the email value
    $query_acc = "
        SELECT idUser, name, lastName, phone, email, AES_DECRYPT(password, 'UnEoCoUaBeDeDs') AS password FROM users WHERE email = '$email' AND password = AES_ENCRYPT('$password', 'UnEoCoUaBeDeDs');
    ";
    $result_acc = mysqli_query($connection, $query_acc);
    $account = mysqli_fetch_array($result_acc);
    if (!$account) {
        criticalError('La contraseña y/o email no coinciden');
    }
    echo 'Profile obtained<br/>';

    // Saving state and account values in session storage
    $_SESSION['state_message'] = 'Logged';
    $_SESSION['user'] = [
        'id' => $account['idUser'],
        'name' => $account['name'],
        'lastName' => $account['lastName'],
        'phone' => $account['phone'],
        'email' => $account['email'],
        'password' => $account['password']
    ];
    
    // Return to main account page
    header("Location: ../tu-cuenta.php");
?> 