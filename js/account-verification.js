let regexInputs = {
    number: /^[0-9]{10,12}$/i,
    email: /^[a-z0-9]+@[a-z0-9]+[.][a-z0-9]+$/i,
    password: /^[a-z0-9_-]{5,15}$/i,
    text: /^[^0-9<>_+=;$#%@&*/!:"')(}{]{3,}$/i
}

let inputsNodes = document.querySelectorAll("input");
let inputsArr = [].slice.call(inputsNodes);
inputsArr.map((input) => {
    console.log(input.type);
    input.addEventListener("change", () => {
        if (regexInputs[input.type].test(input.value)) {
            input.classList.remove("denied");
            input.classList.add("accepted");
        } else {
            input.classList.remove("accepted");
            input.classList.add("denied");
        }

        if ([]
                .slice
                .call(input.parentNode.children)
                .filter(elmnt => elmnt.type != "submit" && elmnt.formAction)
                .every(elmnt => elmnt.classList == "accepted")) {

            []
                .slice
                .call(input.parentNode.children)
                .filter(elmnt => elmnt.type == "submit")
                [0].disabled = false;
            console.log(true);

        } else {

            []
                .slice
                .call(input.parentNode.children)
                .filter(elmnt => elmnt.type == "submit")
                [0].disabled = true;
            console.log(false);

        }
    });
});

let passCrNodes = document.getElementsByClassName("passwordConfirm");
let passCrArr = [].slice.call(passCrNodes);
console.log(passCrArr);
passCrArr.map((passInputs) => {
    let warning = document.createElement("p");
    warning.innerText = "La confirmación de la contraseña no coincide o el formato no es correcto";
    warning.id = "passWarning"
    passInputs.addEventListener("change", () => {
        if (passCrArr[0].value == passCrArr[1].value && [].slice.call(passInputs.classList).some(elmnt => elmnt == "accepted")) {
            passCrArr[1].classList.remove("denied");
            passCrArr[1].classList.add("accepted");
            passCrArr[0].classList.remove("denied");
            passCrArr[0].classList.add("accepted");

            passInputs.parentNode.removeChild(passInputs.parentNode.lastChild)

            if ([]
                    .slice
                    .call(passInputs.parentNode.children)
                    .filter(elmnt => [].slice.call(elmnt.classList).some(clss => clss == "accepted"))) {

            []
                .slice
                .call(passInputs.parentNode.children)
                .filter(elmnt => elmnt.type == "submit")
                [0].disabled = false;
            console.log(true);

        }
        } else {
            passCrArr[1].classList.remove("accepted");
            passCrArr[1].classList.add("denied");
            passCrArr[0].classList.remove("accepted");
            passCrArr[0].classList.add("denied");

            if (passInputs.parentNode.lastChild.id != "passWarning") {
                passInputs.parentNode.appendChild(warning);
            }
        }
    })
})
