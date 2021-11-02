// ======================
// ===== Scroll Bar =====
// ======================

window.onscroll = function() {
    let totalHeight = document.body.scrollHeight - window.innerHeight;
    let progressHeight = (window.pageYOffset / totalHeight) * 90 + 5;
    document.getElementById('progressbar').style.height = progressHeight + "vh";
}

// =============================
// ===== Background bubble =====
// =============================

const bubbles = Array.from(document.getElementsByClassName("bubble"));
var bubbleX = 0;
bubbles.forEach(bubble => {
    document.getElementsByClassName("bubble")[bubbleX].style.left = Math.random() * 100 + "%";
    document.getElementsByClassName("bubble")[bubbleX].style.top = Math.random() * 90 + 10 + "%";
    document.getElementsByClassName("bubble")[bubbleX].style.animationDelay = Math.random() * 5 + "s";
    document.getElementsByClassName("bubble")[bubbleX].style.animationDuration = Math.random() * 5 + 5 + "s";
    var bubbleY = Math.random() * 90 + 20;
    document.getElementsByClassName("bubble")[bubbleX].style.width = bubbleY + "px";
    document.getElementsByClassName("bubble")[bubbleX].style.height = bubbleY + "px";
    document.getElementsByClassName("bubble")[bubbleX].style.background = brgdcolor(Math.random() * 3);
    bubbleX++;
});

function brgdcolor(X) {
    switch (Math.trunc(X)) {
        case 0:
            return "linear-gradient(" + Math.random() * 360 + "deg, #ffbb00, #ff0058)";
        case 1:
            return "linear-gradient(" + Math.random() * 360 + "deg, #03a9f4, #ff0058)";
        case 2:
            return "linear-gradient(" + Math.random() * 360 + "deg, #4dff03, #00d0ff)";
        default:
            return "transparent";
    }
}

// ===================
// ===== On load =====
// ===================

window.onload = function() {
    window.scrollTo(0, 0);
}

// ======================
// ===== Fullscreen =====
// ======================

let fullscreen;
let fsEnter = document.getElementById('fullscr');
fsEnter.addEventListener('click', function(e) {
    e.preventDefault();
    if (!fullscreen) {
        fullscreen = true;
        document.documentElement.requestFullscreen();
        fsEnter.innerHTML = "Exit Fullscreen";
    } else {
        fullscreen = false;
        document.exitFullscreen();
        fsEnter.innerHTML = "Go Fullscreen";
    }
});