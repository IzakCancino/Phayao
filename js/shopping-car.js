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

    console.log(shoppingCar);

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}

// Elimina algun elemento al shoppingCar y actualiza el almacenamiento local
function removeFromTheCar(elmnt) {
    let i = shoppingCar.names.indexOf(elmnt);

    shoppingCar.amount[i]--

    if(shoppingCar.amount[i] === 0) {
        shoppingCar.products.splice(i, 1);
        shoppingCar.names.splice(i, 1);
        shoppingCar.amount.splice(i, 1);
    }

    // if(shoppingCar.amount[i] === 0) {
    //     if (/shopping-car.php/.test(window.location.href)) {
    //         console.log("if TRUE")
    //         if (confirm("Continuar?")) {
    //             console.log("if TRUE");
    //             shoppingCar.products.splice(i, 1);
    //             shoppingCar.names.splice(i, 1);
    //             shoppingCar.amount.splice(i, 1);
    //         } else {
    //             console.log("if FALSE");
    //             score.innerText = parseInt(score.innerText) + 1;
    //             shoppingCar.amount[i]++;
    //         }
    //         rechargeCards();
    //         rechargeCnts();
    //     } else {
    //         console.log("if FALSE")
    //         shoppingCar.products.splice(i, 1);
    //         shoppingCar.names.splice(i, 1);
    //         shoppingCar.amount.splice(i, 1);
    //     }
    // }

    console.log(shoppingCar);

    localStorage.setItem("shoppingCar", JSON.stringify(shoppingCar));
}