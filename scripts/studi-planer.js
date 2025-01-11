// LOGIN BUTTON HANDLER
document.addEventListener('click', function (event) {
    if (!event.target.matches('#studiPlanerLogin')) return;
    setTimeout(() => {
        document.querySelector('#showWhenLoggedIn').style.display = "block";
        document.querySelector('#navShowWhenLoggedIn').style.display = "block";
        document.querySelector('#showWhenLoggedOut').style.display = "none";
        event.target.style.display = "none";
    }, 500);
}, false);

// LOGOUT BUTTON HANDLER
document.addEventListener('click', function (event) {
    if (!event.target.matches('#studiPlanerLogout')) return;
    document.querySelector('#showWhenLoggedIn').style.display = "none";
    document.querySelector('#navShowWhenLoggedIn').style.display = "none";
    document.querySelector('#showWhenLoggedOut').style.display = "block";
    document.querySelector('#studiPlanerLogin').style.display = "block";
}, false);


// MODULE LINK CLICK HANDLER
document.addEventListener('click', function (event) {
    if (!event.target.matches('.moduleLink')) return;
    var moduleclass = event.target.classList[1];
    var studiplanertables = document.querySelectorAll('.studiplanertable');
    studiplanertables.forEach(table => table.style.display = "none");

    document.querySelector('.studiplanertable' + '.' + moduleclass).style.display = "table";
    console.log(moduleclass);
}, false);

// FUNCTION LINK CLICK HANDLER

document.addEventListener('click', function (event) {
    if (!event.target.matches('.functionLink')) return;
    const linkFunction = event.target.dataset.function;
    if (linkFunction === "exportCalendar") {
        const icsFile = createICSFile([{
            startdate: "2022-01-20T12:15",
            enddate: "2022-01-20T12:30",
            summary: "Präsentation Web-Technologien",
            description: `Präsentation des Web-Technologie-Projekts über BigBlueButton`
        }, {
            startdate: "2021-12-13T11:45",
            enddate: "2022-01-31T01:00",
            summary: "Rückmeldungszeitraum Sommersemester 2022",
            description: `Sie können sich ab jetzt durch Zahlung des Semesterbeitrages (übner studis.hochschule-trier.de) bis zum 31.01.2022 zum Sommersemester 2022 zurück melden.`
        }])
        download('studi-planer.ics', icsFile);
    } else if (linkFunction === "newModule") {
        alert('Neues Modul abbonieren');
    }
}, false);


function createICSFile(events) {

    var startstr = "BEGIN:VCALENDAR\n" +
        "CALSCALE:GREGORIAN\n" +
        "METHOD:PUBLISH\n" +
        "PRODID:-//Test Cal//EN\n" +
        "VERSION:2.0\n";

    for (const event of events) {
        startstr += "BEGIN:VEVENT\n" +
            "UID:" + events.indexOf(event) + "-default\n" +
            "DTSTART;VALUE=DATE:" +
            convertDate(event.startdate) +
            "\n" +
            "DTEND;VALUE=DATE:" +
            convertDate(event.enddate) +
            "\n" +
            "SUMMARY:" +
            event.summary +
            "\n" +
            "DESCRIPTION:" +
            event.description +
            "\n" +
            "END:VEVENT\n";
    }

    startstr += "END:VCALENDAR";
    return startstr;
}

function convertDate(date) {
    var event = new Date(date).toISOString();
    event = event.split('.')[0].replaceAll('-', '').replaceAll(':', '');
    return event;
}


function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}