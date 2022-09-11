// Selecciona todas laa cartas y las convierte la lista de nodos en un Array
let cards = document.querySelectorAll(".tarjeta");
cards = [].slice.call(cards);

// Funcion para convertir el titulo de la tarjeta en el valor de tipo: xxxXxxXxx
function obtainProduct(elmnt) {
    let aux = elmnt
                .children[0]
                .innerText
                .split(" ")
                .join("")
                .split("");
    let first = [aux.shift().toLowerCase()];
    let final = first.concat(aux).join("");

    return final;
}

// Deshabilitador / habilitador de botones
function stateBtn(elmnt, bool) {
    elmnt.disabled = bool;
}


// Botones menos
let less = cards.map((elmnt => {
    let btn = elmnt.children[2].children[0];

    btn.addEventListener("click", () => {
        let cnt = elmnt.children[2].children[1];
        if (parseInt(cnt.innerText) > 0) {  
            cnt.innerText = parseInt(cnt.innerText) - 1;
            removeFromTheCar(obtainProduct(elmnt));
            console.log(shoppingCar);
            stateBtn(elmnt.children[2].children[2], false);

            if (parseInt(cnt.innerText) === 0) {
                stateBtn(btn, true);
            }
        }
    });

    // Actualiza los valor de todos los contadores por el valor inicial obtenido
    shoppingCar.products.forEach((product, i) => {
        if (elmnt.children[0].innerText === product.name) { 
            elmnt.children[2].children[1].innerText = shoppingCar.amount[i];
        }
    });

    // Bloquea los botones " - " si el contador marca 0
    if (parseInt(elmnt.children[2].children[1].innerText) === 0) {
        stateBtn(btn, true);
    }

    return btn;
}));

// Botones mas
let more = cards.map((elmnt => {
    let btn = elmnt.children[2].children[2];
    stateBtn(btn, false);

    btn.addEventListener("click", () => {
        let cnt = elmnt.children[2].children[1];
        if (parseInt(cnt.innerText) < 15) {  
            cnt.innerText = parseInt(cnt.innerText) + 1;
            addToTheCar(obtainProduct(elmnt));
            console.log(shoppingCar);

            if (parseInt(cnt.innerText) > 0) {
                stateBtn(elmnt.children[2].children[0], false);
            }
        } else {
            alert("Lo sentimos, no es posible exceder la cantidad de 15 elementos de un mismo producto");
            stateBtn(btn, true);
        }

        
    });

    return btn;
}));