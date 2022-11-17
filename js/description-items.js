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

/**
 * Node list with all the description buttons
 * @type {NodeList}
 */
let descBtnNodes = document.querySelectorAll(".descripcionBtn");

/**
 * Array with all the description buttons
 * @type {HTMLButtonElement[]}
 */
let descBtnArr = [].slice.call(descBtnNodes);

// Pop-up description from the products
descBtnArr.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        // Disable scrolling
        stateScroll(false);
        document.querySelector("#btn-top").disabled = true;

        // Creating pop-up
        let item = eval(btn.dataset.productname);
        let div = document.createElement("div");
        div.id = "description";
        div.innerHTML = `
        <div class="space"></div>
            <section id="des-main">
                <div class="product-info">
                    <div class="product-img-desc">
                        <img src="media/productos/${btn.dataset.productname}.jpg" alt="${item.name}">
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
            document.querySelector("#btn-top").disabled = false;
            stateScroll(true);
            div.remove();
        });
    });
});