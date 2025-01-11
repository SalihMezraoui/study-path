document.addEventListener("DOMContentLoaded", () => {
    // Check if page is loaded for the first time 
    if (localStorage.getItem('firstCall') === null) {
        // Set accessibility preferences of user
        displayDialog();
    }

    setFont(localStorage.getItem('fontSize'));
    setFontFamily(localStorage.getItem('fontFamily'));
});


// function to set font-size
function setFont(size) {
    const body = document.getElementsByTagName("BODY");
    if (size === "large") {
        body[0].style.setProperty('--font-size', 26 + "px");
        body[0].style.setProperty('--sidenav-width', 380 + "px");
    } else if (size === "normal") {
        body[0].style.setProperty('--font-size', 18 + "px");
        body[0].style.setProperty('--sidenav-width', 280 + "px");
    } else {
        displayDialog();
    }
    localStorage.setItem('fontSize', size);
}

// function to set font-family
function setFontFamily(fontname) {
    const body = document.getElementsByTagName("BODY");
    if (fontname === "opensans") {
        body[0].style.setProperty('font-family', 'Open Sans');
    } else if (fontname === "opendyslexic") {
        body[0].style.setProperty('font-family', 'OpenDyslexicAlta');
    }
    localStorage.setItem('fontFamily', fontname);
}

// displays dialog for user to set accessibility preferences
function displayDialog() {
    let selection = confirm("Möchtest du Seite mit zusätzlichen Maßnahmen für Barrierefreiheit darstellen? Dann drücke 'OK'\n\nMöchtest du die Seite ohne zusätzliche Maßnahmen darstellen? Dann drücke 'Abbrechen'.\n\nDu kannst die Einstellungen jeder Zeit in der Seitennavigation unter dem Punkt 'Einstellungen' ändern.");
    if (selection) {
        localStorage.setItem('fontSize', 'large');
    } else {
        localStorage.setItem('fontSize', 'normal');
    }
    localStorage.setItem('firstCall', 'false');
}