/**
 * Button to top element
 */
let btnTop = document.createElement("button");
btnTop.id = "btn-top";
btnTop.innerText = "↑";
btnTop.disabled = true;
document.querySelector("body").appendChild(btnTop);

// Action on click
btnTop.addEventListener("click", () => {
    if (window.scrollY > 300) {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
});

// Visibility in specify height
window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        btnTop.disabled = false;
    } else {
        btnTop.disabled = true;
    }
});