function disableScroll() {
    document.body.classList.add("stop-scrolling");
}
  
function enableScroll() {
    document.body.classList.remove("stop-scrolling");
}

let descBtnNodes = document.querySelectorAll(".descripcionBtn");
let descBtnArr = [].slice.call(descBtnNodes);

descBtnArr.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        disableScroll();
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
        
        document.querySelector("#btn-top").disabled = true;

        div.addEventListener("click", () => {
            document.querySelector("#btn-top").disabled = false;
            div.remove();
            enableScroll();
        });
    });
});

