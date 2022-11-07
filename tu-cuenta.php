<?php 
    include("layouts/head.php"); 
?>

    <link rel="stylesheet" href="styles/tu-cuenta.css">

<?php
    include("layouts/header.php"); 
    include("tu-cuenta/db.php");

    if ($_SESSION['error_message'] != '') {
        echo $_SESSION['error_message'];
    }
?>

<h1>Tu cuenta</h1>

<!-- Si no hay valor en localStorage -->
<section>
    <h2>Iniciar sesión</h2>
    <p class="italic">Si ya tienes una cuenta, inicia sesión con tu E-mail y tu contraseña</p>
    <form action="tu-cuenta/creating-account.php" method="post" id="form-log-in">
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
    <form action="tu-cuenta/creating-account.php" method="get" id="form-sign-up">
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

<!-- FIN!!!! ------ Si no hay valor en localStorage -->


<?php 
    include("layouts/footer.php"); 
?>

    <script src="js/account-verification.js"></script>

</body>
</html>