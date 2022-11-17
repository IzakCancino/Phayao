<?php

    include "db.php";
    include "critical-error.php";

    // Restarting the state of account and user data in this session
    $_SESSION['error_message'] = '';
    $_SESSION['user'] = [];

    // Verification that the connection work
    if (!$connection) {
        criticalError('Error de conexión: ' . mysqli_connect_error());
    }
    echo 'Connected successfully<br/>';

    // Verification that all values has been sent from the form
    if (!isset($_POST["name"], $_POST["lastName"], $_POST["phone"], $_POST["email"], $_POST["password"], $_POST["passwordConfirm"])) {
        criticalError('No se enviaron todos los datos necesarios');
    }

    // Getting the values from the form
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];

    // Verification that the two passwords be the same
    if ($password != $passwordConfirm) {
        criticalError('Las contraseñas no coinciden');
    }
    echo 'Password confirm<br/>';

    // Verification that the email has not been used in another account
    $query_ver_acc = "
        SELECT * FROM users WHERE email = '$email';
    ";
    $result_ver_acc = mysqli_query($connection, $query_ver_acc);
    if (mysqli_fetch_array($result_ver_acc)) {
        criticalError('Email previamente registrado');
    }
    echo 'Email confirm<br/>';
    
    // Creating the account
    $query_new_acc = "
        INSERT INTO users (name, lastName, phone, email, password) VALUES ('$name', '$lastName', '$phone', '$email', AES_ENCRYPT('$password', 'UnEoCoUaBeDeDs'));
    ";
    $result_new_acc = mysqli_query($connection, $query_new_acc);
    if (!$result_new_acc) {
        criticalError('Error al crear la cuenta');
    }
    echo 'Account created<br/>';

    // Verification that the account was created
    $query_obtain_id = "
        SELECT idUser FROM users WHERE email = '$email';
    ";
    $result_obtain_id = mysqli_query($connection, $query_obtain_id);
    if (!$result_obtain_id) {
        criticalError('Error al crear la cuenta');
    }
    $id = mysqli_fetch_array($result_obtain_id)['idUser'];
    echo 'ID obtained ' . $id . '<br/>';

    // Saving state and account values in session storage
    $_SESSION['state_message'] = 'Logged';
    $_SESSION['error_message'] = 'Created';
    $_SESSION['user'] = [
        'id' => $id,
        'name' => $name,
        'lastName' => $lastName,
        'phone' => $phone,
        'email' => $email,
        'password' => $password
    ];
    
    // Return to main account page
    header("Location: ../tu-cuenta.php");
?>