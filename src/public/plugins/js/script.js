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
