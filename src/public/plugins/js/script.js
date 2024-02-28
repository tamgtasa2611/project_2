//ScrollReveal
let fadeIn = {
    duration: 1400,
    delay: 100,
    easing: "ease",
};
let fadeInFast = {
    duration: 1200,
    delay: 100,
    easing: "ease",
};
let fadeInFaster = {
    duration: 1000,
    delay: 100,
    easing: "ease",
};
let fadeTop = {
    distance: "40%",
    origin: "top",
};
let fadeLeft = {
    distance: "40%",
    origin: "left",
};
let fadeRight = {
    distance: "40%",
    origin: "right",
};
let fadeBottom = {
    distance: "40%",
    origin: "bottom",
};


ScrollReveal().reveal(".fade-in", fadeIn);
ScrollReveal().reveal(".fade-in-fast", fadeInFast);
ScrollReveal().reveal(".fade-in-faster", fadeInFaster);
ScrollReveal().reveal(".fade-left", fadeLeft);
ScrollReveal().reveal(".fade-right", fadeRight);
ScrollReveal().reveal(".fade-top", fadeTop);
ScrollReveal().reveal(".fade-bottom", fadeBottom);

$(document).ready(function () {
    $(window).scroll((e) => {
        let navBar = $("#navbar");
        if (window.scrollY >= 20) {
            navBar.removeClass("border-white");
        } else {
            navBar.addClass("border-white");
        }
    });
});
