/**
 * Change the scrolling state in the page
 * @param {boolean} state - Determine the new scrolling state
 * @returns {void} No value
 */
function stateScroll(state) {
    if (state) {
        document.body.classList.remove("stop-scrolling");
        return;
    }
    document.body.classList.add("stop-scrolling");
}

/**
 * Create a pop-up with values
 * @param {string} title The title to be showed in the pop-up
 * @param {string} message The message to be showed in the pop-up
 * @returns {void} No value
 */
function popUp(title = "Titulo", message = "Mensaje") {
    // Disable scrolling
    stateScroll(false);
    document.querySelector("#btn-top").disabled = true;

    // Creating pop-up
    let div = document.createElement("div");
    div.id = "description";
    div.innerHTML = `
        <div class="space"></div>
            <section id="des-main">
                <h3>${title}:</h3>
                <p id="info">${message}</p>
            </section>                          
        <div class="space"></div>`;

    document.querySelector("body").appendChild(div);

    // Close pop-up
    div.addEventListener("click", () => {
        document.querySelector("#btn-top").disabled = false;
        stateScroll(true);
        div.remove();
    });
}