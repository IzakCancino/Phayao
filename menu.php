<?php 
    include("layouts/head.php"); 
?>

	<link rel="stylesheet" type="text/css" href="styles/menu.css">
	<link rel="stylesheet" type="text/css" href="styles/description-pop-up.css">

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
			<img src="media/productos/padThai.jpg" alt="padThai">
			<div class="contador" data-productName="padThai">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="padThai">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto2A">
			<h3>Som Tam</h3>
			<img src="media/productos/somTam.jpg" alt="somTam">
			<div class="contador" data-productName="somTam">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="somTam">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto3A">
			<h3>Kao Pad Separod</h3>
			<img src="media/productos/kaoPadSeparod.jpg" alt="kaoPadSeparod">
			<div class="contador" data-productName="kaoPadSeparod">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="kaoPadSeparod">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto4A">
			<h3>Kai Pad Med Mamuang</h3>
			<img src="media/productos/kaiPadMedMamuang.jpg" alt="kaiPadMedMamuang">
			<div class="contador" data-productName="kaiPadMedMamuang">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="kaiPadMedMamuang">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto5A">
			<h3>Pad Krapau</h3>
			<img src="media/productos/padKrapau.jpg" alt="padKrapau">
			<div class="contador" data-productName="padKrapau">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="padKrapau">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto6A">
			<h3>Pad Siuw</h3>
			<img src="media/productos/padSiuw.jpg" alt="padSiuw">
			<div class="contador" data-productName="padSiuw">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="padSiuw">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto7A">
			<h3>Kai Tod</h3>
			<img src="media/productos/kaiTod.jpg" alt="kaiTod">
			<div class="contador" data-productName="kaiTod">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="kaiTod">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto8A">
			<h3>Kuai Tieow</h3>
			<img src="media/productos/kuaiTieow.jpg" alt="kuaiTieow">
			<div class="contador" data-productName="kuaiTieow">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="kuaiTieow">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto9A">
			<h3>Yam Ma Khwa Yao</h3>
			<img src="media/productos/yamMaKhwaYao.jpg" alt="yamMaKhwaYao">
			<div class="contador" data-productName="yamMaKhwaYao">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="yamMaKhwaYao">Descripción</button>
		</div>

		<div class="tarjeta comida" id="producto10A">
			<h3>Kai Mu Satae</h3>
			<img src="media/productos/kaiMuSatae.jpg" alt="kaiMuSatae">
			<div class="contador" data-productName="kaiMuSatae">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="kaiMuSatae">Descripción</button>
		</div>
	</section>

	<section id="postres" class="grupo deselectedGrupo">
		<div class="tarjeta postre" id="producto1B">
			<h3>Khao Tom Mad</h3>
			<img src="media/productos/khaoTomMad.jpg" alt="khaoTomMad">
			<div class="contador"  data-productName="khaoTomMad">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="khaoTomMad">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto2B">
			<h3>Sticky Rice con Mango</h3>
			<img src="media/productos/stickyRiceconMango.jpg" alt="stickyRiceconMango">
			<div class="contador" data-productName="stickyRiceconMango">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="stickyRiceconMango">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto3B">
			<h3>Kluay Tod</h3>
			<img src="media/productos/kluayTod.jpg" alt="kluayTod">
			<div class="contador" data-productName="kluayTod">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="kluayTod">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto4B">
			<h3>Khanom Tarn</h3>
			<img src="media/productos/khanomTarn.jpg" alt="khanomTarn">
			<div class="contador" data-productName="khanomTarn">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="khanomTarn">Descripción</button>
		</div>

		<div class="tarjeta postre" id="producto5B">
			<h3>Khanom Pang Wan</h3>
			<img src="media/productos/khanomPangWan.jpg" alt="khanomPangWan">
			<div class="contador" data-productName="khanomPangWan">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="khanomPangWan">Descripción</button>
		</div>
	</section>

	<section id="bebidas" class="grupo deselectedGrupo">
		<div class="tarjeta bebida" id="producto1C">
			<h3>Cha Yen</h3>
			<img src="media/productos/chaYen.jpg" alt="chaYen">
			<div class="contador" data-productName="chaYen">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="chaYen">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto2C">
			<h3>Cha Manao</h3>
			<img src="media/productos/chaManao.jpg" alt="chaManao">
			<div class="contador" data-productName="chaManao">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="chaManao">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto3C">
			<h3>Na Manao</h3>
			<img src="media/productos/naManao.jpg" alt="naManao">
			<div class="contador" data-productName="naManao">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="naManao">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto4C">
			<h3>Soda de Manao</h3>
			<img src="media/productos/sodadeManao.jpg" alt="sodadeManao">
			<div class="contador" data-productName="sodadeManao">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="sodadeManao">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto5C">
			<h3>Singha Cerveza</h3>
			<img src="media/productos/singhaCerveza.jpg" alt="singhaCerveza">
			<div class="contador" data-productName="singhaCerveza">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="singhaCerveza">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto6C">
			<h3>Siam Mary</h3>
			<img src="media/productos/siamMary.jpg" alt="siamMary">
			<div class="contador" data-productName="siamMary">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="siamMary">Descripción</button>
		</div>

		<div class="tarjeta bebida" id="producto7C">
			<h3>Oliang Cafe</h3>
			<img src="media/productos/oliangCafe.jpg" alt="oliangCafe">
			<div class="contador" data-productName="oliangCafe">
				<button class="menosBtn">-</button>
				<p>0</p>
				<button class="masBtn">+</button>
			</div>
			<button class="descripcionBtn" data-productName="oliangCafe">Descripción</button>
		</div>
	</section>
</main>

<?php 
    include("layouts/footer.php"); 
?>

	<script src="js/create-items.js"></script>
	<script src="js/shopping-car.js"></script>
	<script src="js/menu-contadores.js"></script>
	<script src="js/menu-categorias.js"></script>
	<script src="js/description-items.js"></script>

</body>
</html>