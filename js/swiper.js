var swiper = new Swiper(".mySwiper", {
  slidesPerView: "auto",
  slidesPerGroup: 3,
  spaceBetween: 20,
  loop: true,
  loopFillGroupWithBlank: true,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
