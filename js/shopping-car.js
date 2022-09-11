let shoppingCar = {
    products: [],
    names: [],
    amount: []
};

// Obtiene el shoppingCar desde el almacenamiento local
if (localStorage.getItem("shoppingCar")) {
    let obj = JSON.parse(localStorage.getItem("shoppingCar"));
    shoppingCar = obj;
}

// Agrega algun elemento al shoppingCar y actualiza el almacenamiento local
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

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}

// Elimina algun elemento al shoppingCar y actualiza el almacenamiento local
function removeFromTheCar(elmnt) {
    let obj = eval(elmnt);
    let i = shoppingCar.names.indexOf(elmnt);

    shoppingCar.amount[i]--

    if(shoppingCar.amount[i] === 0) {
        shoppingCar.products.splice(i, 1);
        shoppingCar.names.splice(i, 1);
        shoppingCar.amount.splice(i, 1);
    }

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}