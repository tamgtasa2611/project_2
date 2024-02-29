//ScrollReveal
let FadeIn = {
    duration: 1200,
}
let scaleUp = {
    scale: 0.85
}
let scaleDown = {
    scale: 1.15
}
let fadeTop = {
    origin: "top", distance: "20px"
}
let fadeBottom = {
    origin: "bottom", distance: "20px"
}
let fadeLeft = {
    origin: "left", distance: "40px"
}
let fadeRight = {
    origin: "right", distance: "40px"
}

ScrollReveal().reveal(".fade-scale-up", scaleUp);
ScrollReveal().reveal(".fade-scale-down", scaleDown);
ScrollReveal().reveal(".fade-in", FadeIn);
ScrollReveal().reveal(".fade-std");
ScrollReveal().reveal(".fade-top", fadeTop);
ScrollReveal().reveal(".fade-bottom", fadeBottom);
ScrollReveal().reveal(".fade-left", fadeLeft);
ScrollReveal().reveal(".fade-right", fadeRight);

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
