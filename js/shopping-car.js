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

/**
 * Add an element to the shopping car and update the local storage
 * @param {string} elmnt Name of the element to add
 * @return {void} No value
 */
function addToTheCar(elmnt) {
    let obj = eval(elmnt);
    let i = shoppingCar.names.indexOf(elmnt);

    if (i === -1) {
        shoppingCar.products.push(obj);
        shoppingCar.names.push(elmnt);
        shoppingCar.amount.push(1);
    } else {
        shoppingCar.amount[i]++
    }

    console.log(shoppingCar);

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}

/**
 * Delete an element to the shopping car and update the local storage
 * @param {string} elmnt Name of the element to delete
 * @return {void} No value
 */
function removeFromTheCar(elmnt) {
    let i = shoppingCar.names.indexOf(elmnt);

    shoppingCar.amount[i]--

    if(shoppingCar.amount[i] === 0) {
        shoppingCar.products.splice(i, 1);
        shoppingCar.names.splice(i, 1);
        shoppingCar.amount.splice(i, 1);
    }

    console.log(shoppingCar);

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}

/**
 * Delete an completely a product to the shopping car and update the local storage
 * @param {string} elmnt Name of the element to delete totally
 * @return {void} No value
 */
function deleteFromTheCar(elmnt) {
    let i = shoppingCar.names.indexOf(elmnt);

    shoppingCar.products.splice(i, 1);
    shoppingCar.names.splice(i, 1);
    shoppingCar.amount.splice(i, 1);
    
    console.log(shoppingCar);

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}