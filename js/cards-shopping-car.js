let divCardsNodes = document.querySelector("#products");
let divCardsArr = [].slice.call(divCardsNodes);

let divInfo = document.querySelector("#info");
let cntProducts = divInfo.children[1].children[0].children[0];
let cntAmount = divInfo.children[2].children[0].children[0];

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

    /**
     * Change the scrolling state in the page
     * @param {boolean} state - Determine the new scrolling state
     * @returns {void} No value
     */
    function stateScroll(state) {
        if (state) {
            document.body.classList.remove("stop-scrolling");
            return;
        }
        document.body.classList.add("stop-scrolling");
    }

    // Pop-up description from the products
    let imgsNodes = document.querySelectorAll(".imgs");
    let imgsArr = [].slice.call(imgsNodes);

    imgsArr.forEach((img, i) => {
        img.addEventListener("click", () => {
            // Disable scrolling
            stateScroll(false);
            btnTop.disabled = true;

            // Creating pop-up
            let item = eval(img.dataset.productname);
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

            // Close pop-up
            div.addEventListener("click", () => {
                stateScroll(true);
                btnTop.disabled = false;
                div.remove();
            });
        });
    });
}

rechargeCards();