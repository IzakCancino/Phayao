let divCardsNodes = document.querySelector("#products");
let divCardsArr = [].slice.call(divCardsNodes);

function rechargeCards() {
    divCardsNodes.innerHTML = "";
    shoppingCar.products.forEach((product, i) => {
        console.log(product, i)

        let div = document.createElement("div");
        div.classList.add("tarjeta");
        div.innerHTML = `
            <div class="num">
                <p>#${i+1}</p>
            </div>

            <div class="imgs" data-productName="${shoppingCar.names[i]}">
                <div class="product-img"><img src="media/productos/${shoppingCar.names[i]}.jpg" alt="${product.name}"></div>
            </div>

            <div class="product">
                <h3>${product.name}</h3>
                <p>$${product.price}</p>
            </div>

            <div class="contador" data-productName="${shoppingCar.names[i]}">
                    <button class="menosBtn">-</button>
                    <p>${shoppingCar.amount[i]}</p>
                    <button class="masBtn">+</button>
                    <button class="deleteBtn"><img src="media/icons/delete.png" alt="Delete icon"></button>
            </div>`;

        divCardsNodes.appendChild(div);
    });
}

rechargeCards();

//const productTemplate = 
    // `<div class="tarjeta">
    //     <div class="num">
    //         <p>#${i+1}</p>
    //     </div>

    //     <div class="imgs" data-productName="${shoppingCar.names[i]}">
    //         <div class="product-img"><img src="media/productos/${shoppingCar.names[i]}.jpg" alt="${shoppingCar.products[i].name}"></div>
    //     </div>

    //     <div class="product">
    //         <h3>${shoppingCar.names[i]}.jpg" alt="${shoppingCar.products[i].name}/h3>
    //         <p>$${shoppingCar.names[i]}.jpg" alt="${shoppingCar.products[i].price}</p>
    //     </div>

    //     <div class="contador" data-productName="${shoppingCar.names[i]}">
    //             <button class="menosBtn">-</button>
    //             <p>${shoppingCar.amount[i]}</p>
    //             <button class="masBtn">+</button>
    //             <button class="deleteBtn"><img src="media/icons/delete.png" alt="Delete icon"></button>
    //     </div>
    // </div>`;

/* 
<div class="tarjeta">
    <div class="num">
        <p>#NUMERO</p>
    </div>

    <div class="imgs" data-productName="VAR-PRODUCT">
        <div class="product-img"><img src="media/productosIMAGEN.jpg" alt=""></div>
    </div>

    <div class="product">
        <h3>PRODUCTO/h3>
        <p>$PRECIO</p>
    </div>

    <div class="contador" data-productName="VAR-PRODUCT">
            <button class="menosBtn">-</button>
            <p>CANTIDAD</p>
            <button class="masBtn">+</button>
            <button class="deleteBtn"><img src="media/icons/delete.png" alt="Delete icon"></button>
    </div>
</div>
*/