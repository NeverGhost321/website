var swiper = new Swiper(".mySwiper", {
    effect: "coverflow", // Используйте эффект "coverflow" вместо "cards"
    grabCursor: true,
    initialSlide: 2,
    loop: true,
    rotate: true,
    mousewheel: {
        invert: false,
    },
});