<?php

    include "../db.php";
    include "../critical-error.php";

    // Restarting the state of error message
    $_SESSION['error_message'] = '';
    $userId = $_SESSION['user']['id'];

    // Verification that the connection work
    if (!$connection) {
        criticalError('Error de conexión: ' . mysqli_connect_error(), "../../");
    }
    echo 'Connected successfully<br/>';

    // Verification that the selected car has been sent
    if (!isset($_GET['car'])) {
        criticalError('No se selecciono ningún carrito', "../../");
    }

    // Verification that the selected car be in the accepted range
    $carID = $_GET['car'];
    if ($carID < 1 || $carID > 3) {
        criticalError('Numero de carrito invalido', "../../");
    }

    // Getting the list data that match with the idUser
    $query_list = "
        SELECT car1, car2, car3, name1, name2, name3 FROM saved_cars WHERE idUser = '$userId';
    ";
    $result_list = mysqli_query($connection, $query_list);
    $list = mysqli_fetch_array($result_list, MYSQLI_ASSOC);
    if (!$list) {
        criticalError('Error al obtener el carrito de compras', "../../");
    } 
    echo 'List obtained<br/>';

    // Saving the cars and the names of them in individual arrays
    $cars = [
        'car1' => [
            'id' => 1, 
            'value' => $list['car1']
        ], 
        'car2' =>[
            'id' => 2,
            'value' => $list['car2']
        ], 
        'car3' => [
            'id' => 3,
            'value' => $list['car3']
        ]
    ];
    $names = [
        $list['name1'], 
        $list['name2'], 
        $list['name3']
    ];


    // Filtering the selected name car and the nulls values, later padding the void spaces with the string "NULL"
    $newNamesOrder = array_pad(
        array_filter($names, function ($elmnt) use($list, $carID) {
            return (array_search($elmnt, $list) != "name" . $carID && $elmnt != null); 
        }), 3, "NULL");

    // Assign every name to one variable
    $name1 = $newNamesOrder[0];
    $name2 = $newNamesOrder[1];
    $name3 = $newNamesOrder[2];

    // Filtering the selected car and the nulls values, later padding the void spaces with the string "NULL"
    $newCarsOrder = array_pad(
        array_map(function ($elmnt) {
            return $elmnt['value'];
        }, array_filter($cars, function ($elmnt) use($cars, $carID) {
                return (array_search([
                    'id' => $elmnt['id'], 
                    'value' => $elmnt['value']
                ], $cars) != "car" . $carID && $elmnt['value'] != null);
            })
        ), 3, "NULL");

    // Assign every car to one variable
    $car1 = $newCarsOrder[array_keys($newCarsOrder)[0]];
    $car2 = $newCarsOrder[array_keys($newCarsOrder)[1]];
    $car3 = $newCarsOrder[array_keys($newCarsOrder)[2]];

    // Making the query to update the cars list, for nulls values don't need to use simple quotes in him value
    $query_update_car = "UPDATE saved_cars SET ";

    $query_update_car .= ($car1 == "NULL") ? "car1 = $car1, name1 = $name1, " : "car1 = '$car1', name1 = '$name1', ";
    $query_update_car .= ($car2 == "NULL") ? "car2 = $car2, name2 = $name2, " : "car2 = '$car2', name2 = '$name2', ";
    $query_update_car .= ($car3 == "NULL") ? "car3 = $car3, name3 = $name3" : "car3 = '$car3', name3 = '$name3'";

    $query_update_car .= " WHERE idUser = $userId;";

    // Updating the shopping cars list to his new values
    $result_update_car = mysqli_query($connection, $query_update_car);
    if (!$result_update_car) {
        criticalError("No se pudo actualizar la lista de carritos guardados", "../../");
    }
    echo 'Car list updated<br/>';
    

    // Return to main account page
    header("Location: ../../tu-cuenta.php");

?> 