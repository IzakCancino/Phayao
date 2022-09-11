<?php 
    include("layouts/head.php"); 
?>

	<link rel="stylesheet" type="text/css" href="styles/menu.css">

<?php 
    include("layouts/header.php"); 
?>

<main>
	<div id="secciones">
		<div id="divComidas">
			<button id="btnComidas">Comidas</button>
		</div>
		<div id="divPostres" class="deselectedSeccion">
			<button id="btnPostres">Postres</button>
		</div>
		<div id="divBebidas" class="deselectedSeccion">
			<button id="btnBebidas">Bebidas</button>
		</div>
	</div>

	<section id="comida" class="grupo">
		<div class="tarjeta comida" id="producto1A">
			<h3>Pad Thai</h3>
			<img src="media/comidas/Pad-Thai.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto2A">
			<h3>Som Tam</h3>
			<img src="media/comidas/Som-Tam.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto3A">
			<h3>Kao Pad Separod</h3>
			<img src="media/comidas/Kao-Pad-Saparot.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto4A">
			<h3>Kai Pad Med Mamuang</h3>
			<img src="media/comidas/Kai-Pad-Med-Mamuang.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto5A">
			<h3>Pad Krapau</h3>
			<img src="media/comidas/Pad-Krapau.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto6A">
			<h3>Pad Siuw</h3>
			<img src="media/comidas/Pad-Siuw.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto7A">
			<h3>Kai Tod</h3>
			<img src="media/comidas/Kai-Tod.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto8A">
			<h3>Kuai Tieow</h3>
			<img src="media/comidas/Kuai-Tieow.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto9A">
			<h3>Yam Ma Khwa Yao</h3>
			<img src="media/comidas/Yam-Ma-Khwa-Yao.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto10A">
			<h3>Kai Mu Satae</h3>
			<img src="media/comidas/Kai-Mu-Satae.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>
	</section>

	<section id="postres" class="grupo deselectedGrupo">
		<div class="tarjeta postre" id="producto1B">
			<h3>Khao Tom Mad</h3>
			<img src="media/postres/Khao-Tom-Mad.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto2B">
			<h3>Sticky Rice con Mango</h3>
			<img src="media/postres/Sticky-Rice-con-Mango.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto3B">
			<h3>Kluay Tod</h3>
			<img src="media/postres/Kluay-Tod.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto4B">
			<h3>Khanom Tarn</h3>
			<img src="media/postres/Khanom-Tarn.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto5B">
			<h3>Khanom Pang Wan</h3>
			<img src="media/postres/Khanom-Pang-Wan.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>
	</section>

	<section id="bebidas" class="grupo deselectedGrupo">
		<div class="tarjeta bebida" id="producto1C">
			<h3>Cha Yen</h3>
			<img src="media/bebidas/Cha-Yen.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto2C">
			<h3>Cha Manao</h3>
			<img src="media/bebidas/Cha-Manao.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto3C">
			<h3>Na Manao</h3>
			<img src="media/bebidas/Nam-Manao.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto4C">
			<h3>Soda de Manao</h3>
			<img src="media/bebidas/Soda-de-Manao.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto5C">
			<h3>Singha Cerveza</h3>
			<img src="media/bebidas/Singha-Cerveza.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto6C">
			<h3>Siam Mary</h3>
			<img src="media/bebidas/Siam-Mary.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto7C">
			<h3>Oliang cafe</h3>
			<img src="media/bebidas/Oliang-Cafe.jpg">
			<div class="contador">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn">Descripción</button>
		</div>
	</section>
</main>

<?php 
    include("layouts/footer.php"); 
?>

	<script src="js/shopping-car.js"></script>
	<script src="js/menu-contadores.js"></script>
	<script src="js/menu-categorias.js"></script>

</body>
</html>