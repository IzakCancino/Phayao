// For "tu-cuenta.php", create a basic card with the information about the actual shopping car

/** 
 * The shopping car object
 * @type {{products: Object[], names: string[], amount: number[]}}
 * @param {Object[]} products Array of products objects: `{name: string, price: number, description: string, type: string}`
 * @param {string[]} names Array of the products names saved in the `dataset.productname` of the element
 * @param {number[]} amount Array with the amount of a individual product
 */
 let shoppingCar = {
    products: [],
    names: [],
    amount: []
};

// Obtain the shopping car from the local storage
if (localStorage.getItem("shoppingCar")) {
    let obj = JSON.parse(localStorage.getItem("shoppingCar"));
    shoppingCar = obj;
}

// Creating the card of the actual shopping car
let section = document.getElementById("actual-car");
section.innerHTML = "";

actualCar = document.createElement("div");
actualCar.classList.add("cars");

if (shoppingCar.products.length > 0) {
    actualCar.innerHTML = `
        <p>Productos: <span class="italic">${ shoppingCar.amount.reduce((a, b) => a + b) }</span></p>

        <p>Total: <span class="italic">$</span><span class="italic">${
            (shoppingCar.products.length > 1) ? 
                shoppingCar.products.reduce((a, b, i) => {
                    if (typeof a != 'number') {
                        return (a.price * shoppingCar.amount[i-1]) + (b.price * shoppingCar.amount[i]);
                    }
                    return a + (b.price * shoppingCar.amount[i]);
                }) : 
                (shoppingCar.products[0].price * shoppingCar.amount[0])
        }</span></p>

        <a href="${
            "tu-cuenta/shopping-car/save-car.php?car=" + encodeURIComponent(JSON.stringify(shoppingCar))
        }"><p>+ Guardar</p></a>`;
} else {
    actualCar.innerHTML = `<p>Carrito vació</p>`
}

section.appendChild(actualCar);