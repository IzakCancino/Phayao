<?php

    include "../db.php";
    include "../critical-error.php";
    date_default_timezone_set("America/Matamoros");

    // Restarting the state of error message
    $_SESSION['error_message'] = '';
    $userId = $_SESSION['user']['id'];
    $date = date("D d-M, H:i:s");

    // Verification that the connection work
    if (!$connection) {
        criticalError('Error de conexión: ' . mysqli_connect_error(), "../../");
    }
    echo 'Connected successfully<br/>';

    // Verification that the shopping car has been sent
    if (!isset($_GET['car'])) {
        criticalError('No se enviaron todos los datos necesarios', "../../");
    }

    // Getting the shopping car from the link
    $shoppingCar = $_GET['car'];

    // Getting the list data that match with the idUser
    $query_list = "
        SELECT * FROM saved_cars WHERE idUser = '$userId';
    ";
    $result_list = mysqli_query($connection, $query_list);
    $list = mysqli_fetch_array($result_list, MYSQLI_ASSOC);
    if (!$list) {
        // If no exist any list, create them, whit the shopping car in "car1"
        $query_create_list = "
            INSERT INTO saved_cars (car1, name1, idUser) VALUES ('$shoppingCar', '$date', '$userId');
        ";
        $result_create_list = mysqli_query($connection, $query_create_list);
        echo 'List created<br/>';
        echo 'Space 1 updated<br/>';

        header("Location: ../../tu-cuenta.php");
    } 
    echo 'List obtained<br/>';

    // Update with shopping car value the next void space in the list
    $carToUpdate = 
        ((!$list['car1']) ? "1" :
        ((!$list['car2']) ? "2" :
        ((!$list['car3']) ? "3" : 
           criticalError("Solo se puede almacenar un máximo de 3 carritos de compras", "../../")
        )));
    
    $query_update_car = "
        UPDATE saved_cars SET car$carToUpdate = '$shoppingCar', name$carToUpdate = '$date' WHERE idUser = '$userId';
    ";
    $result_update_car = mysqli_query($connection, $query_update_car);
    if (!$result_update_car) {
        criticalError("No se pudo actualizar la lista de carritos guardados", "../../");
    }
    echo 'Space ' . $carToUpdate . ' updated<br/>';
    
    // Return to main account page
    header("Location: ../../tu-cuenta.php");
?> 