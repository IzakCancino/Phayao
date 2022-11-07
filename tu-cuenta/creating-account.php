<?php
    include "db.php";

    // Restarting the state of  account and user data in this session
    $_SESSION['error_message'] = '';
    $_SESSION['state_message'] = 'Not logged';
    $_SESSION['user'] = [];

    // Verification that the connection work
    if (!$connection) {
        $_SESSION['error_message'] = 'Error de conexión: ' . mysql_error;
        header("Location: ../tu-cuenta.php");
        die('Error de conexión: ' . mysql_error);
    }
    echo 'Connected successfully<br/>';

    // Verification that all values has been sent from the form
    if (!isset($_GET["name"], $_GET["lastName"], $_GET["phone"], $_GET["email"], $_GET["password"], $_GET["passwordConfirm"])) {
        $_SESSION['error_message'] = 'No se enviaron todos los datos necesarios';
        header("Location: ../tu-cuenta.php");
        die('No se enviaron todos los datos necesarios');
    }

    // Getting the values from the form
    $name = $_GET["name"];
    $lastName = $_GET["lastName"];
    $phone = $_GET["phone"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $passwordConfirm = $_GET["passwordConfirm"];

    // Verification that the two passwords be the same
    if ($password != $passwordConfirm) {
        $_SESSION['error_message'] = 'Las contraseñas no coinciden';
        header("Location: ../tu-cuenta.php");
        die('Las contraseñas no coinciden');
    }
    echo 'Password confirm<br/>';

    // Verification that the email has not been used in another account
    $query_ver_acc = "
        SELECT * FROM users WHERE email = '$email';
    ";
    $result_ver_acc = mysqli_query($connection, $query_ver_acc);
    if (mysqli_fetch_array($result_ver_acc)) {
        echo mysqli_fetch_array($result_ver_acc);
        $_SESSION['error_message'] = 'Email previamente registrado';
        header("Location: ../tu-cuenta.php");
        die('Email previamente registrado');
    }
    echo 'Email confirm<br/>';
    
    // Creating the account
    $query_new_acc = "
        INSERT INTO users (name, lastname, phone, email, password) VALUES ('$name', '$lastName', '$phone', '$email', AES_ENCRYPT('$password', 'UnEoCoUaBeDeDs'));
    ";
    $result_new_acc = mysqli_query($connection, $query_new_acc);
    if (!$result_new_acc) {
        $_SESSION['error_message'] = 'Error al crear la cuenta';
        header("Location: ../tu-cuenta.php");
        die('Error al crear la cuenta');
    }
    echo 'Account created<br/>';

    // Verification that the account was created
    $query_obtain_id = "
        SELECT idUser FROM users WHERE email = '$email';
    ";
    $result_obtain_id = mysqli_query($connection, $query_obtain_id);
    if (!$result_obtain_id) {
        $_SESSION['error_message'] = 'Error al crear la cuenta';
        header("Location: ../tu-cuenta.php");
        die('Error al crear la cuenta');
    }
    $id = mysqli_fetch_array($result_obtain_id)[0];
    echo 'ID obtained ' . $id . '<br/>';

    // Saving state and account values in session storage
    $_SESSION['state_message'] = 'Logged';
    $_SESSION['user'] = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];
    
    // Return to main account page
    header("Location: ../tu-cuenta.php");
?>