let keys = {
    37: "left",
    38: "up",
    39: "right",
    40: "down",
    65: "a",
    66: "b"
};

let konamiCode = ["up", "up", "down", "down", "left", "right", "left", "right", "b", "a"];

document.addEventListener("keydown", checkCode, false);

let keyCount = 0;

function checkCode(event) {
    let keyPressed = keys[event.keyCode];

    if (keyPressed === konamiCode[keyCount]) {
        keyCount++;

        if (keyCount === konamiCode.length) {
            activateCheats();
            resetKeyState();
        }
    } else {
        resetKeyState();
    }
}

function activateCheats() {
    // Ajouter la classe pour changer le fond en noir
    document.body.classList.add("black-background");

    // Cacher la vidéo
    const video = document.getElementById("background-video");
    if (video) {
        video.style.display = "none";
    }

    // Rediriger vers une autre page
    window.location.href = '../controllers/controller-endpage.php';
}

function resetKeyState() {
    keyCount = 0;
}

let button = document.getElementById("konami-button");

button.addEventListener("click", function() {
   alert("Vous avez réussi a stopper les ombres, bravo !");
})

