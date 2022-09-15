// Selecciona todas laa cartas y las convierte la lista de nodos en un Array
let cntNodes = document.querySelectorAll(".contador");
let cntArr = [].slice.call(cntNodes);


// Función para convertir el titulo de la tarjeta en el valor de tipo: xxxXxxXxx
function obtainProduct(cnt) {  //PENDIENTE!!!
    return cnt.dataset.productname;
}

// Deshabilitador / habilitador de botones
function stateBtn(elmnt, bool) {  //PENDIENTE!!!
    elmnt.disabled = bool;
}

// Botones menos
let less = cntArr.map((cnt => {
    let btn = cnt.children[0];

    btn.addEventListener("click", () => {
        let score = cnt.children[1];
        if (parseInt(score.innerText) > 0) {  
            score.innerText = parseInt(score.innerText) - 1;
            removeFromTheCar(obtainProduct(cnt));
            console.log(shoppingCar);
            stateBtn(cnt.children[2], false);

            if (parseInt(score.innerText) === 0) {
                stateBtn(btn, true);
            }
        }
    });

    // Actualiza los valor de todos los contadores por el valor inicial obtenido
    shoppingCar.names.forEach((product, i) => {
        if (obtainProduct(cnt) === product) { 
            cnt.children[1] = shoppingCar.amount[i];
        }
    });
    

    // Bloquea los botones " - " si el contador marca 0
    if (parseInt(cnt.children[1].innerText) === 0) {
        stateBtn(btn, true);
    }

    return btn;
}));

// Botones mas
let more = cntArr.map((cnt => {
    let btn = cnt.children[2];
    stateBtn(btn, false);

    btn.addEventListener("click", () => {
        let score = cnt.children[1];
        if (parseInt(score.innerText) < 15) {  
            score.innerText = parseInt(score.innerText) + 1;
            addToTheCar(obtainProduct(cnt));
            console.log(shoppingCar);

            if (parseInt(score.innerText) > 0) {
                stateBtn(cnt.children[0], false);
            }
        } else {
            alert("Lo sentimos, no es posible exceder la cantidad de 15 elementos de un mismo producto");
            stateBtn(btn, true);
        }

        
    });

    return btn;
}));

//   Previene que se actualize la pagina con un pop-up
// window.onbeforeunload = function() {
//     return "any alert mssg";
// }