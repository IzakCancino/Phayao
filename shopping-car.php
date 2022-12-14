<?php 
    include("layouts/head.php"); 
?>

    <link rel="stylesheet" type="text/css" href="styles/shopping-car.css">
    <link rel="stylesheet" type="text/css" href="styles/description-pop-up.css">

<?php 
    include("layouts/header.php"); 
?>

<h1>Carrito de compras</h1>

<main>
    <section id="info">
        <h2>Información:</h2>
        <div>
            <p>Productos: <span class="italic" id="cnt-products">0</span></p>
        </div>
        <div>
            <p>Total: <span class="italic">$</span><span class="italic" id="cnt-amounts">0</span></p>
        </div>
        <a href="pedidos.php" class="btn-submit-car">Realizar pedido</a>
    </section>

    <section id="products">
        <div class="tarjeta">
            <div class="num">
                <p>#X</p>
            </div>

            <div class="imgs">
                <div class="product-img"><img src="" alt=""></div>
            </div>

            <div class="product">
                <h3>Product</h3>
                <p>$X</p>
            </div>

            <div class="contador" data-productName="">
                    <button class="menosBtn">-</button>
                    <p>X</p>
                    <button class="masBtn">+</button>
                    <button class="deleteBtn"><img src="media/icons/delete.png" alt="Delete icon"></button>
            </div>
        </div>
    </section>
</main>


<?php 
    include("layouts/footer.php"); 
?>
    <script src="js/create-items.js"></script>
	<script src="js/shopping-car.js"></script>
    <script src="js/cards-shopping-car.js"></script>
	<script src="js/menu-contadores.js"></script>
</body>
</html>