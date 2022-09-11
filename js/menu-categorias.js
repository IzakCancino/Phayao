const btnComidas = document.querySelector("#btnComidas");
const btnPostres = document.querySelector("#btnPostres");
const btnBebidas = document.querySelector("#btnBebidas");
const divsBtns = document.querySelectorAll("#secciones div");
const sections = document.querySelectorAll("main section");

btnComidas.addEventListener("click", () => {
    divsBtns[0].classList.remove("deselectedSeccion");
    divsBtns[1].classList.add("deselectedSeccion");
    divsBtns[2].classList.add("deselectedSeccion");

    sections[0].classList.remove("deselectedGrupo");
    sections[1].classList.add("deselectedGrupo");
    sections[2].classList.add("deselectedGrupo");
});

btnPostres.addEventListener("click", () => {
    divsBtns[0].classList.add("deselectedSeccion");
    divsBtns[1].classList.remove("deselectedSeccion");
    divsBtns[2].classList.add("deselectedSeccion");

    sections[0].classList.add("deselectedGrupo");
    sections[1].classList.remove("deselectedGrupo");
    sections[2].classList.add("deselectedGrupo");
});

btnBebidas.addEventListener("click", () => {
    divsBtns[0].classList.add("deselectedSeccion");
    divsBtns[1].classList.add("deselectedSeccion");
    divsBtns[2].classList.remove("deselectedSeccion");

    sections[0].classList.add("deselectedGrupo");
    sections[1].classList.add("deselectedGrupo");
    sections[2].classList.remove("deselectedGrupo");
});

