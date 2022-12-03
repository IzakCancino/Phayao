<?php
    include("layouts/head.php");
?>

    <link rel="stylesheet" href="styles/tu-cuenta.css">
    <link rel="stylesheet" href="styles/description-pop-up.css">

<?php
    include("layouts/header.php");
    include("tu-cuenta/db.php");

    if (!isset($_SESSION['state_message'])) {
        $_SESSION['state_message'] = 'Not logged';
    }
?>

<h1>Tu cuenta</h1>

<?php
    // If hasn't logged, show the log-in and sign-in sections
    if (($_SESSION['state_message']) == "Not logged") { ?> 
        
        <section>
            <h2>Iniciar sesión</h2>
            <p class="italic">Si ya tienes una cuenta, inicia sesión con tu E-mail y tu contraseña</p>
            <form action="tu-cuenta/log-in.php" method="post" id="form-log-in">
                <label for="email">E-mail: </label><br/>
                <input type="email" name="email" id="email" required placeholder="example@gmail.com" maxlength="40"><br/>
                <label for="password">Contraseña: </label><br/>
                <input type="password" name="password" id="password" required placeholder="*****" maxlength="15"><br/>

                <input type="submit" value="Enviar" id="btn-submit" disabled><br/>
            </form>
        </section>

        <section>
            <h2>Crear una cuenta</h2>
            <p class="italic">Si aun no tienes una cuenta, aquí puedes crearla</p>
            <form action="tu-cuenta/sign-in.php" method="post" id="form-sign-up">
                <label for="name">Nombre(s): </label><br/>
                <input type="text" name="name" id="name" required placeholder="Nombre" maxlength="25"><br/>
                <label for="lastName">Apellidos: </label><br/>
                <input type="text" name="lastName" id="lastName" required placeholder="Apellido" maxlength="35"><br/>
                <label for="phone">Teléfono: </label><br/>
                <input type="number" name="phone" id="phone" required placeholder="0000000000" maxlength="12"><br/>
                <label for="email">E-mail: </label><br/>
                <input type="email" name="email" id="email" required placeholder="example@gmail.com" maxlength="40"><br/>
                <label for="password">Contraseña: </label><br/>
                <input type="password" name="password" class="passwordConfirm" required placeholder="*****" maxlength="15"><br/>
                <label for="passwordConfirm">Confirma tu contraseña: </label><br/>
                <input type="password" name="passwordConfirm" class="passwordConfirm" required placeholder="*****" maxlength="15"><br/>

                <input type="submit" value="Enviar" id="btn-submit" disabled><br/>
            </form>
        </section>
        
    <?php }

    // If has logged show the profile, shopping cars saved list and more options
    if (($_SESSION['state_message']) == "Logged") { ?>
        <section>   
            <h2>Tu perfil</h2>
            <p>Nombre: <?php echo $_SESSION['user']['name'] . " " . $_SESSION['user']['lastName']; ?></p>
            <p>Teléfono: <?php echo $_SESSION['user']['phone']; ?></p>
            <p>E-mail: <?php echo $_SESSION['user']['email']; ?></p>
        </section>

        <section id="shopping-cars">   
            <h2>Carritos de compras</h2>

            <h3>Carrito actual</h3>
            
            <div id="actual-car">
                <div class="cars">
                    <p>Productos: <span class="italic">0</span></p>
                    <p>Total: <span class="italic">$</span><span class="italic">0</span></p>
                    <a href=""><p>+ Guardar</p></a>
                </div>
            </div>

            <h3>Carritos guardados</h3>
            <div id="saved-cars">
            <?php
                $userId = $_SESSION['user']['id'];

                // Getting the list data that match with the idUser
                $query_list = " SELECT * FROM saved_cars WHERE idUser = '$userId'; ";
                $result_list = mysqli_query($connection, $query_list);
                $list = mysqli_fetch_array($result_list, MYSQLI_ASSOC);
                if (!$list || (!$list['car1'] && !$list['car2'] && !$list['car3'])) { ?>
                    
                    <div class="cars">
                        <h4>No hay carritos guardados</h4>
                    </div>
                    
                <?php } else {
                    for ($i=1; $i <= (
                        ($list['car1'] ? 1 : 0) + ($list['car2'] ? 1 : 0) + ($list['car3'] ? 1 : 0)
                    ); $i++) { ?>
                        <div class="cars">
                            <h4><?php echo $list['name' . $i];?></h4>
                            <p>Productos: <span class="italic"><?php 
                                $listObj = json_decode($list['car' . $i]);
                                $amounts = 0;
                                foreach ($listObj -> amount as $elmnt) {
                                    $amounts += $elmnt;
                                }
                                echo $amounts;
                            ?></span></p>
                            <p>Total: <span class="italic">$</span><span class="italic"><?php
                                $listObj = json_decode($list['car' . $i]);
                                $price = 0;
                                foreach ($listObj -> products as $elmnt) {
                                    $price += ($elmnt -> price * ($listObj -> amount[array_search($elmnt, $listObj -> products)]));
                                }
                                echo $price;
                            ?></span></p>
                            <a href="tu-cuenta/shopping-car/update-car.php?car=<?php echo $i; ?>"><p>✓ Usar</p></a>
                            <a href="tu-cuenta/shopping-car/delete-car.php?car=<?php echo $i; ?>"><p>— Eliminar</p></a>
                        </div>
                    <?php }
                } 
            ?>
            </div>
        </section>

        <section id="more-options">
            <h2>Más opciones</h2>
            <a href="tu-cuenta/modify-account.php" title="Modificar tu información" id="a-modify">
                <img src="media/icons/modify.png" alt="Modificar tu información icono" id="img-modify">
                <p>Modificar tu información</p>
            </a>

            <a href="tu-cuenta/log-out.php" title="Cerrar sesión" id="a-logout">
                <img src="media/icons/log-out.png" alt="Cerrar sesión icono" id="img-logout">
                <p>Cerrar sesión</p>
            </a>
        </section>

    <?php }

    // If has pressed the modify account button
    if (($_SESSION['state_message']) == "Modify") { ?> 
        <section>
            <h2>Modificar tu información</h2>
            <p class="italic">Ingresa todos tus datos para actualizarlos (puedes o no cambiar tu contraseña)</p>
            <form action="tu-cuenta/modify-account.php" method="post" id="form-sign-up">
                <label for="name">Nombre(s): </label><br/>
                <input type="text" name="name" id="name" required placeholder="Nombre" maxlength="25"><br/>
                <label for="lastName">Apellidos: </label><br/>
                <input type="text" name="lastName" id="lastName" required placeholder="Apellido" maxlength="35"><br/>
                <label for="phone">Teléfono: </label><br/>
                <input type="number" name="phone" id="phone" required placeholder="0000000000" maxlength="12"><br/>
                <label for="email">E-mail: </label><br/>
                <input type="email" name="email" id="email" required placeholder="example@gmail.com" maxlength="40"><br/>
                <label for="password">Contraseña: </label><br/>
                <input type="password" name="password" class="passwordConfirm" required placeholder="*****" maxlength="15"><br/>
                <label for="passwordConfirm">Confirma tu contraseña: </label><br/>
                <input type="password" name="passwordConfirm" class="passwordConfirm" required placeholder="*****" maxlength="15"><br/>

                <input type="submit" value="Enviar" id="btn-submit" disabled><br/>
            </form>
        </section>
        
    <?php }

?>

<?php 
    include("layouts/footer.php"); 
?>

    <script src="js/account-verification.js"></script>
    <script src="js/pop-up.js"></script>
    <script src="js/basic-data-shopping-car.js"></script>

<?php

    // Pop-up in case of recent created account
    if (isset($_SESSION['error_message']) && ($_SESSION['error_message']) == 'Created') {
        echo '<script>popUp("Aviso", "Cuenta creada exitosamente, bienvenid@ ' . $_SESSION['user']['name'] . '")</script>';
        $_SESSION['error_message'] = '';
    }

    // Pop-up in case of a previous error message
    if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != '') {
        echo '<script>popUp("Error", "' . $_SESSION['error_message'] . '")</script>';
        $_SESSION['error_message'] = '';
    }

?>

</body>
</html>