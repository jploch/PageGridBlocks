
// load font awesome 5 if in use
window.addEventListener("load", function () {
    const far = document.getElementsByClassName("far");
    const fab = document.getElementsByClassName("fab");
    const fas = document.getElementsByClassName("fas");

    if (far.length > 0 || fas.length > 0 || fab.length > 0) {
        const fileref = document.createElement("link")
        const filename = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css";
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
        document.getElementsByTagName("head")[0].appendChild(fileref);
    }

    if (far.length > 0) {
        const fileref = document.createElement("link")
        const filename = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/regular.min.css";
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
        document.getElementsByTagName("head")[0].appendChild(fileref);
    }

    if (fas.length > 0) {
        const fileref = document.createElement("link")
        const filename = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css";
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
        document.getElementsByTagName("head")[0].appendChild(fileref);
    }

    if (fab.length > 0) {
        const fileref = document.createElement("link")
        const filename = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css";
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
        document.getElementsByTagName("head")[0].appendChild(fileref);
    }

});