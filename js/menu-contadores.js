let cards = document.querySelectorAll(".tarjeta");
// Convierte la lista de nodos en un Array
cards = [].slice.call(cards);

// Botones menos
let less = cards.map((elmnt => {
    let btn = elmnt.children[2].children[0];

    btn.addEventListener("click", () => {
        let cnt = elmnt.children[2].children[1];
        if (parseInt(cnt.innerText) > 0) {  
            cnt.innerText = parseInt(cnt.innerText) - 1;
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
        } else {
            alert("Lo sentimos, no es posible exceder la cantidad de 15 elementos de un mismo producto");
        }


        



    });

    return btn;
}));