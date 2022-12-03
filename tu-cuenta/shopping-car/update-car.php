<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        $query_car = "
            SELECT car$carID FROM saved_cars WHERE idUser = '$userId';
        ";
        $result_car = mysqli_query($connection, $query_car);
        $car = mysqli_fetch_array($result_car, MYSQLI_ASSOC);
        if (!$car) {
            criticalError('Error al obtener el carrito de compras', "../../");
        } 
        echo 'List obtained<br/>';

    ?>

    <!-- A hidden paragraph for obtain the info -->
    <p id="car" hidden><?php echo $car['car' . $carID]; ?></p>

    <script>
        // Script for update the shopping car in the local storage
        let carObj = document.querySelector("#car");
        let car = JSON.parse(carObj.innerText);
        localStorage.setItem("shoppingCar", JSON.stringify(car));
        window.open("../../tu-cuenta.php", "_self");
    </script>

</body>
</html>