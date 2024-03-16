//ScrollReveal
let FadeIn = {
    duration: 1200,
};
let scaleUp = {
    scale: 0.85,
};
let scaleDown = {
    scale: 1.15,
};
let fadeTop = {
    origin: "top",
    distance: "20px",
};
let fadeBottom = {
    origin: "bottom",
    distance: "20px",
};
let fadeLeft = {
    origin: "left",
    distance: "40px",
};
let fadeRight = {
    origin: "right",
    distance: "40px",
};

ScrollReveal().reveal(".fade-scale-up", scaleUp);
ScrollReveal().reveal(".fade-scale-down", scaleDown);
ScrollReveal().reveal(".fade-in", FadeIn);
ScrollReveal().reveal(".fade-std");
ScrollReveal().reveal(".fade-top", fadeTop);
ScrollReveal().reveal(".fade-bottom", fadeBottom);
ScrollReveal().reveal(".fade-left", fadeLeft);
ScrollReveal().reveal(".fade-right", fadeRight);

$(document).ready(function () {
    // NAV BAR SCROLL
    $(window).scroll((e) => {
        let navBar = $("#navbar");
        if (window.scrollY >= 20) {
            navBar.removeClass("border-white ");
        } else {
            navBar.addClass("border-white");
        }
    });

    // ALERT
    setInterval(function () {
        $(".alert").addClass("opacity-0");
        setInterval(function () {
            $(".alert").fadeOut();
        }, 1000);
    }, 3500);

    // PASSWORD EYE
    $("#show_hide_password a").on("click", function (event) {
        event.preventDefault();
        if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("bi-eye-slash");
            $("#show_hide_password i").removeClass("bi-eye");
        } else if ($("#show_hide_password input").attr("type") == "password") {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("bi-eye-slash");
            $("#show_hide_password i").addClass("bi-eye");
        }
    });

    // DELETE MODAL
    $(document).on("click", ".dlt-btn", function () {
        let id = $(this).attr("data-id");
        $("#id").val(id);
    });
    $(document).on("click", ".modalBtn", function () {
        let id = $(this).attr("data-id");
        $("#id").val(id);
    });

    //ROOM BOOKING
    let checkIn = $("#checkin");
    let checkOut = $("#checkout");
    let checkValid = true;
    let dateError = $("#dateError");
    let dayBooked = 0;
    let basePrice = $("#basePriceModal").val();
    let amount = 0;
    let bookBtn = $("#bookBtn");
    let currentDate = new Date().toJSON().slice(0, 10);

    function dateErrorAction() {
        dateError.removeClass("d-none");
        bookBtn.removeAttr("type").attr("type", "button");
    }

    function dateValidAction() {
        dateError.addClass("d-none");
        dateError.html();
        bookBtn.removeAttr("type").attr("type", "submit");

        let date1 = new Date(checkIn.val()).getTime();
        let date2 = new Date(checkOut.val()).getTime();
        dayBooked = Math.round((date2 - date1) / (1000 * 3600 * 24));
        if (dayBooked === 1) {
            $("#dayBooked").html(`1 day`);
            $("#amount").html(`${basePrice}`);
        } else {
            if (isNaN(dayBooked)) {
                $("#dayBooked").html(`0 day`);
                $("#amount").html(`0.00`);
            } else {
                $("#dayBooked").html(`${dayBooked} days`);
                $("#amount").html(`${basePrice * dayBooked}`);
            }
        }
    }

    checkIn.on("change", function () {
        // neu ngay check in o trong qua khu
        if (checkIn.val() < currentDate) {
            dateErrorAction();
            dateError.html(
                `<i class="bi bi-emoji-frown me-2"></i>You can't choose a date from the past!`,
            );
        } else {
            // kiem tra hop le
            checkValid = checkIn.val() < checkOut.val();
            if (checkValid === false && checkOut.val() !== "") {
                dateErrorAction();
                dateError.html(
                    `<i class="bi bi-emoji-frown me-2"></i>The check-out date must be after the check-in date!`,
                );
            } else {
                dateValidAction();
            }
        }
    });

    checkOut.on("change", function () {
        // kiem tra hop le
        checkValid = checkIn.val() < checkOut.val();
        // let dayBooked = checkOut.val() - checkIn.val();

        if (checkValid === false) {
            dateErrorAction();
            dateError.html(
                `<i class="bi bi-emoji-frown me-2"></i>The check-out date must be after the check-in date!`,
            );
        } else {
            dateValidAction();
        }
    });
});
