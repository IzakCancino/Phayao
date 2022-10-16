// window.scrollTo({ top: 0, behavior: 'smooth' });

let btnTop = document.createElement("button");
btnTop.id = "btn-top";
btnTop.innerText = "↑";
btnTop.disabled = true;

document.querySelector("body").appendChild(btnTop);

btnTop.addEventListener("click", () => {
    if (window.scrollY > 300) {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
        console.log("HERE!!!", window.scrollY);
    }
    
});

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        btnTop.disabled = false;
    } else {
        btnTop.disabled = true;
    }
});