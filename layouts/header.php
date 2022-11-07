<!-- This is the universal header and the navigation bar in all the pages -->
</head>
<body>
	<header>
		<div id="logo">
			<img src="media/logoName.png" id="img-logo">
		</div>
		<nav class="normal-nav">
			<a href="index.php" id="inicio">Inicio</a>
			<a href="menu.php" id="menu">Menú</a>
			<a href="reservaciones.php" id="reservaciones">Reservaciones</a>
			<a href="contactanos.php" id="contactanos">Contáctanos</a>
			<div id="div-space-gr"></div>
			<a href="tu-cuenta.php" id="btn-tu-cuenta">Tu Cuenta</a>
				 <!-- TODO: Si hay un valor en el almacenamiento local esta logeado, entonces cambiar el color del boton -->
		</nav>
		<nav class="dropdown">
			<button>Menu</button>
			<div class="dropdown-content">
				<a href="index.php" id="inicio-dd">Inicio</a>
				<a href="menu.php" id="menu-dd">Menú</a>
				<a href="reservaciones.php" id="reservaciones-dd">Reservaciones</a>
				<a href="contactanos.php" id="contactanos-dd">Contáctanos</a>
				<a href="tu-cuenta.php" id="tucuenta-dd">Tu Cuenta</a>
				<!-- TODO: Si hay un valor en el almacenamiento local esta logeado, entonces cambiar el color del boton -->
			</div>
		</nav>
		<div id="carrito">
			<img src="media/icons/carrito.png" id="img-carrito" onclick="window.open('shopping-car.php', '_top')">
		</div>
	</header>