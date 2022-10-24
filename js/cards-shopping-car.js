let divCardsNodes = document.querySelector("#products");
let divCardsArr = [].slice.call(divCardsNodes);
let cntProducts = document.querySelector("#cnt-products");
let cntAmount = document.querySelector("#cnt-amounts");

/**
 * Recharge the products cards in the shopping car page
 * @return {void} No value
 */
function rechargeCards() {
    divCardsNodes.innerHTML = "";
    cntProducts.innerText = 0;
    cntAmount.innerText = 0;
    
    shoppingCar.products.forEach((product, i) => {
        cntProducts.innerText = parseInt(cntProducts.innerText) + shoppingCar.amount[i];
        cntAmount.innerText = parseInt(cntAmount.innerText) + (parseInt(product.price) * shoppingCar.amount[i]);

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


    // Pop-up description from the products
    let imgsNodes = document.querySelectorAll(".imgs");
    let imgsArr = [].slice.call(imgsNodes);

    imgsArr.forEach((img, i) => {
        img.addEventListener("click", () => {
            let item = eval(img.dataset.productname);
            console.log(item);
            let div = document.createElement("div");
            div.id = "description";
            div.innerHTML = `
            <div class="space"></div>
                <section id="des-main">
                    <div class="product-info">
                        <div class="product-img-desc">
                            <img src="media/productos/${shoppingCar.names[i]}.jpg" alt="${item.name}">
                        </div>
                        <div class="product-name">
                            <h3>${item.name}</h3>
                            <p class="italic">$${item.price}</p>
                        </div>
                    </div>

                    <div class="product-des">
                        <p id="info">${item.description}</p>
                    </div>
                </section>                          
            <div class="space"></div>`;

            document.querySelector("main").appendChild(div);

            div.addEventListener("click", () => {
                div.remove();
            });
        });
    });
}

rechargeCards();