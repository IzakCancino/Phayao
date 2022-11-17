/**
 * A storage of the regex's used in the inputs verification
 */
let regexInputs = {
    number: /^[0-9]{10,12}$/i,
    email: /^[a-z0-9]+@[a-z0-9]+[.][a-z0-9.]+$/i,
    password: /^[a-z0-9_-]{5,15}$/i,
    text: /^[^0-9<>_+=;$#%@&*/!:"')(}{]{3,}$/i
}

/**
 * Node list with all the inputs
 * @type {NodeList}
 */
let inputsNodes = document.querySelectorAll("input");

/**
 * Array with all the inputs
 * @type {HTMLInputElement[]}
 */
let inputsArr = [].slice.call(inputsNodes);
inputsArr.map((input) => {
    input.addEventListener("change", () => {
        // If the input value has the accepted format in him regex
        if (regexInputs[input.type].test(input.value)) {
            input.classList.remove("denied");
            input.classList.add("accepted");
        } else {
            input.classList.remove("accepted");
            input.classList.add("denied");
        }

        // If all the inputs, that not be of the "submit" type and has a form, and has the "accepted" class
        if ([]
                .slice
                .call(input.parentNode.children)
                .filter(elmnt => elmnt.type != "submit" && elmnt.formAction)
                .every(elmnt => [].slice.call(elmnt.classList).some(clss => clss == "accepted"))
        ) {
            // If yes, enable the submit button in these form
            []
                .slice
                .call(input.parentNode.children)
                .filter(elmnt => elmnt.type == "submit")
                [0].disabled = false;
        } else {
            // If no, disable the submit button in these form
            []
                .slice
                .call(input.parentNode.children)
                .filter(elmnt => elmnt.type == "submit")
                [0].disabled = true;
        }
    });
});

/**
 * Node list with all the inputs with class "passwordConfirm"
 * @type {NodeList}
 */
let passCrNodes = document.getElementsByClassName("passwordConfirm");
document
/**
 * Array with all the inputs
 * @type {HTMLInputElement[]} The inputs have the type `password`
 */
let passCrArr = [].slice.call(passCrNodes);

// Map for the password inputs in Create a account section
passCrArr.map((passInputs) => {
    // Creating a "p" element to warning in case of incorrect passwords
    let warning = document.createElement("p");
    warning.innerText = "La confirmación de la contraseña no coincide o el formato no es correcto";
    warning.id = "passWarning";

    passInputs.addEventListener("change", () => {
        // If both password input has the same value, and some of the password inputs has the class "accepted"
        if (passCrArr[0].value == passCrArr[1].value && [].slice.call(passInputs.classList).some(elmnt => elmnt == "accepted")) {
            // If yes, remove to both inputs the class "denied", and add the class "accepted"
            passCrArr[1].classList.remove("denied");
            passCrArr[1].classList.add("accepted");
            passCrArr[0].classList.remove("denied");
            passCrArr[0].classList.add("accepted");

            // Removing the 'warning' element
            passInputs.parentNode.removeChild(passInputs.parentNode.lastChild);

            // If both password input has the same value, and has the class "accepted"
            if ([]
                    .slice
                    .call(passInputs.parentNode.children)
                    .filter(elmnt => [].slice.call(elmnt.classList).some(clss => clss == "accepted")) &&
                []
                    .slice
                    .call(passInputs.parentNode.children)
                    .filter(elmnt => elmnt.type != "submit" && elmnt.formAction)
                    .every(elmnt => [].slice.call(elmnt.classList).some(clss => clss == "accepted"))
            ) {
                // If yes, enable the "submit" button
                []
                    .slice
                    .call(passInputs.parentNode.children)
                    .filter(elmnt => elmnt.type == "submit")
                    [0].disabled = false;
            }
        } else {
            // If no, remove to both inputs the class "accepted", and add the class "denied"
            passCrArr[1].classList.remove("accepted");
            passCrArr[1].classList.add("denied");
            passCrArr[0].classList.remove("accepted");
            passCrArr[0].classList.add("denied");

            // Disable the "submit" button
            []
                .slice
                .call(passInputs.parentNode.children)
                .filter(elmnt => elmnt.type == "submit")
                [0].disabled = true;

            // If the warning don't exist, create it
            if (passInputs.parentNode.lastChild.id != "passWarning") {
                passInputs.parentNode.appendChild(warning);
            }
        }
    })
})
