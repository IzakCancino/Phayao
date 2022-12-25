/** Array with all the section buttons */
const btnsSections = document.querySelectorAll(".btnSeccion");

/** Array with all the sections */
const sections = document.querySelectorAll("main section");

btnsSections.forEach(elmnt => {
    elmnt.addEventListener("click", () => {
        /**
         * In each section check if the id of the pressed button and the current section being checked are equal, if yes: remove the "deselected" classes, if not: add the "deselected" classes, to the section and the button
        */
        for (let i = 0; i < 3; i++) {
            if (btnsSections[i].id === elmnt.id) {
                btnsSections[i].parentNode.classList.remove("deselectedSeccion");
                sections[i].classList.remove("deselectedGrupo");
                continue;
            }
            btnsSections[i].parentNode.classList.add("deselectedSeccion");
            sections[i].classList.add("deselectedGrupo");
        }
    })
});