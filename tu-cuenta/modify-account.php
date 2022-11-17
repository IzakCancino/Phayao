<?php

    include "db.php";
    include "critical-error.php";

    $_SESSION['state_message'] = 'Logged';

    // If data hasn't be sended
    if (!$_POST) {
        $_SESSION['state_message'] = 'Modify';
        $_SESSION['error_message'] = '';
        header("Location: ../tu-cuenta.php");
        die("Redireccionando a 'Tu cuenta'");
    }

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
    $email = $_POST["email"]; //$email = "jbondley0@wiley.com";
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];

    // Verification that the two passwords be the same
    if ($password != $passwordConfirm) {
        criticalError('Las contraseñas no coinciden');
    }
    echo 'Password confirm<br/>';

    // Verification that the email has not been used in another account
    $query_ver_acc = "
        SELECT idUser FROM users WHERE email = '$email' AND idUser <> " . $_SESSION['user']['id'] . ";
    ";
    $result_ver_acc = mysqli_query($connection, $query_ver_acc);
    $arr_users = mysqli_fetch_all($result_ver_acc);
    if ($arr_users) {
        criticalError('Email previamente registrado');
    }
    echo 'Email confirm<br/>';

    // Upload the changes to the database
    $query_update_vals = "
        UPDATE users SET name = '$name', lastName = '$lastName', phone = '$phone', email = '$email', password = AES_ENCRYPT('$password', 'UnEoCoUaBeDeDs') WHERE idUser = " . $_SESSION['user']['id'] . ";
    ";
    $result_update_vals = mysqli_query($connection, $query_update_vals);
    if (!$result_update_vals) {
        criticalError('Error al subir los datos');
    }
    echo 'Data upload<br/>';

    // Saving state and account values in session storage
    $_SESSION['state_message'] = 'Logged';
    $_SESSION['user'] = [
        'id' => $_SESSION['user']['id'],
        'name' => $name,
        'lastName' => $lastName,
        'phone' => $phone,
        'email' => $email,
        'password' => $password
    ];

    // Return to main account page
    header("Location: ../tu-cuenta.php");

?>