/**
 * Recharge the counts in the menu page
 * @return {void} No value
 */
function rechargeCnts() {
    /**
     * Node list with all the counters div
     * @type {NodeList}
     */
    let cntNodes = document.querySelectorAll(".contador");

    /**
     * Array with all the counters div
     * @type {HTMLDivElement[]}
     */
    let cntArr = [].slice.call(cntNodes);

    // Messages
    let msgAlrtDltProduct = "¿Desea continuar? Si lo hace se eliminara el producto del carrito de compras";
    let msgAlrtMaxCntProducts = "Lo sentimos, no es posible exceder la cantidad de 15 elementos de un mismo producto";

    /**
     * Giving a HTML element obtain the dataset.productname value
     * @param {HTMLDivElement} cnt The counter div, with their buttons and the count 
     * @returns {string} The dataset _productname_ in the counter `cnt `
     */
    function obtainProduct(cnt) {
        return cnt.dataset.productname;
    }

    /**
     * Change the button use state
     * @param {HTMLButtonElement} elmnt - Button to will enabled/disabled 
     * @param {boolean} bool - New value for the element 
     * @return {void} No value
     */
    function stateBtn(elmnt, bool) {
        elmnt.disabled = bool;
    }

    /**
     * Edit and remove an element from the shopping car and from the count
     * @param {HTMLParagraphElement} score - Element that have the count
     * @param {HTMLDivElement} cnt - Counter father of `score` and the buttons _less_ and _more_
     */
    function removeProduct(score, cnt) {
        score.innerText = parseInt(score.innerText) - 1;
        removeFromTheCar(obtainProduct(cnt));
        stateBtn(cnt.children[2], false);
    }

    /**
     * Buttons less in all the counters 
     * @type {HTMLButtonElement[]}
     */
    let less = cntArr.map((cnt => {
        /**
         * Buttons less in the current counter
         * @type {HTMLButtonElement}
         */
        let btn = cnt.children[0];

        btn.addEventListener("click", () => {
            /**
             * Element that have the count
             * @type {HTMLParagraphElement}
             */
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

        // Update the values from all the counters to the initial value obtained
        shoppingCar.names.forEach((product, i) => {
            if (obtainProduct(cnt) === product) { 
                cnt.children[1].innerText = shoppingCar.amount[i];
            }
        });
        
        // Block the less buttons if the counter mark 0
        if (parseInt(cnt.children[1].innerText) === 0) {
            stateBtn(btn, true);
        }
        
        return btn;
    }));

    /**
     * Buttons more in all the counters 
     * @type {HTMLButtonElement[]}
     */
    let more = cntArr.map((cnt => {
        /**
         * Buttons less in the current counter
         * @type {HTMLButtonElement}
         */
        let btn = cnt.children[2];
        stateBtn(btn, false);

        btn.addEventListener("click", () => {
            /**
             * Element that have the count
             * @type {HTMLParagraphElement}
             */
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
    // Buttons "delete" in all the counters, only if be in the shoopping-car.php page
    if (/shopping-car.php/.test(window.location.href)) {
        let deletes = cntArr.map((cnt => {
            /**
             * Buttons "delete" in the current counter
             * @type {HTMLButtonElement}
             */
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

/**
 * Auxiliar function to recall the _rechargeCnts()_ function
 * @return {void} No value
 */
function rechargeCntsAux () {
    rechargeCnts();
}