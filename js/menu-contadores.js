function rechargeCnts() {
    // Selecciona todas laa cartas y las convierte la lista de nodos en un Array
    let cntNodes = document.querySelectorAll(".contador");
    let cntArr = [].slice.call(cntNodes);

    // Mensajes
    let msgAlrtDltProduct = "¿Desea continuar? Si lo hace se eliminara el producto del carrito de compras";
    let msgAlrtMaxCntProducts = "Lo sentimos, no es posible exceder la cantidad de 15 elementos de un mismo producto";

    // Función para convertir el titulo de la tarjeta en el valor de tipo: xxxXxxXxx
    function obtainProduct(cnt) {  //PENDIENTE!!!
        return cnt.dataset.productname;
    }

    // Deshabilitador / habilitador de botones
    function stateBtn(elmnt, bool) {
        elmnt.disabled = bool;
    }

    // Función que edita y remueve un elemento del carrito y contador
    function removeProduct(score, cnt) {
        score.innerText = parseInt(score.innerText) - 1;
        removeFromTheCar(obtainProduct(cnt));
        stateBtn(cnt.children[2], false);
    }

    // Botón menos de los contadores
    let less = cntArr.map((cnt => {
        let btn = cnt.children[0];

        btn.addEventListener("click", () => {
            let score = cnt.children[1];
            if (parseInt(score.innerText) > 0) {  
                if(parseInt(score.innerText) === 1) {
                    if (/shopping-car.php/.test(window.location.href)) {
                        if (confirm(msgAlrtDltProduct)) {
                            removeProduct(score, cnt);
                            rechargeCards();
                            rechargeCntsAux();
                        }
                    } else {
                        removeProduct(score, cnt);
                    }
                } else {
                    removeProduct(score, cnt);
                }

                if (parseInt(score.innerText) === 0) {
                    stateBtn(btn, true);
                }
            }

            if (/shopping-car.php/.test(window.location.href)) {  
                rechargeCards();
                rechargeCntsAux();
            }
        });

        // Actualiza los valor de todos los contadores por el valor inicial obtenido
        shoppingCar.names.forEach((product, i) => {
            if (obtainProduct(cnt) == product) { 
                cnt.children[1].innerText = shoppingCar.amount[i];
            }
        });
        

        // Bloquea los botones " - " si el contador marca 0
        if (parseInt(cnt.children[1].innerText) === 0) {
            stateBtn(btn, true);
        }
        
        return btn;
    }));

    // Botón más de los contadores
    let more = cntArr.map((cnt => {
        let btn = cnt.children[2];
        stateBtn(btn, false);

        btn.addEventListener("click", () => {
            let score = cnt.children[1];
            if (parseInt(score.innerText) < 15) {  
                score.innerText = parseInt(score.innerText) + 1;
                addToTheCar(obtainProduct(cnt));

                if (parseInt(score.innerText) > 0) {
                    stateBtn(cnt.children[0], false);
                }
            } else {
                alert(msgAlrtMaxCntProducts);
                stateBtn(btn, true);
            }

            if (/shopping-car.php/.test(window.location.href)) {  
                rechargeCards();
                rechargeCntsAux();
            }
        });

        return btn;
    }));

    // Botón delete de los contadores, solo si se esta en la pagina del shopping car
    if (/shopping-car.php/.test(window.location.href)) {
        let deletes = cntArr.map((cnt => {
            let btn = cnt.children[3];

            btn.addEventListener("click", () => {
                let score = cnt.children[1];
                if (confirm(msgAlrtDltProduct)) {
                    deleteFromTheCar(obtainProduct(cnt));
                    rechargeCards();
                    rechargeCntsAux();
                }
            });

            return btn;
        }));
    }
}

rechargeCnts();

function rechargeCntsAux () {
    rechargeCnts();
}