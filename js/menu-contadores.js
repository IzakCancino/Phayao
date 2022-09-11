let cards = document.querySelectorAll(".tarjeta");
// Convierte la lista de nodos en un Array
cards = [].slice.call(cards);


function obtainProduct(elmnt) {
    let aux = elmnt
                .children[0]
                .innerText
                .split(" ")
                .join("")
                .split("");
             
    let first = [aux.shift().toLowerCase()];

    let final = first.concat(aux).join("");

    return eval(final);
}

// LO ULTIMO QUE HICE FUE CREAR LAS FUNCIONES PARA SACAR Y METER PRODUCTOS AL CARRITO, Y CUADO QUEDEN 0 LOS SACA


// Botones menos
let less = cards.map((elmnt => {
    let btn = elmnt.children[2].children[0];

    btn.addEventListener("click", () => {
        let cnt = elmnt.children[2].children[1];
        if (parseInt(cnt.innerText) > 0) {  
            cnt.innerText = parseInt(cnt.innerText) - 1;
            removeFromTheCar(obtainProduct(elmnt));
            console.log(shoppingCar);
        }
    });

    return btn;
}));

// Botones mas
let more = cards.map((elmnt => {
    let btn = elmnt.children[2].children[2];

    btn.addEventListener("click", () => {
        let cnt = elmnt.children[2].children[1];
        if (parseInt(cnt.innerText) < 15) {  
            cnt.innerText = parseInt(cnt.innerText) + 1;
            addToTheCar(obtainProduct(elmnt));
            console.log(shoppingCar);
        } else {
            alert("Lo sentimos, no es posible exceder la cantidad de 15 elementos de un mismo producto");
        }

        
    });

    return btn;
}));