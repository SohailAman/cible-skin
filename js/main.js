"use strict";

const yearEl = document.querySelector(".year");
const currentYear = new Date().getFullYear();
yearEl.textContent = currentYear;

const btnNavEl = document.querySelectorAll(".header__menu-btn");
const headerEl = document.querySelector(".header");

btnNavEl.forEach((btn) =>
  btn.addEventListener("click", () => headerEl.classList.toggle("nav-open"))
);

const googleSplide = new Splide(".google__splide", {
  focus: "center",
  type: "loop",
  perPage: 1,
  perMove: 1,
  mediaQuery: "min",
  padding: { left: "3.3em", right: "5em" },
  breakpoints: {
    560: {
      perPage: 2,
      padding: { left: "5.2em", right: "5.2em" },
      gap: "5rem",
    },
    768: {
      padding: { left: "5.2em", right: "5.2em" },
      gap: "5rem",
    },

    1119: {
      gap: "null",
      perPage: 2,
      padding: { left: "2px", right: "100px" },
      width: "795px",
    },
  },
});
googleSplide.mount();

const maisonSlider = new Splide(".maison__splide", {
  focus: "center",
  type: "loop",
  perPage: 1,
  perMove: 1,
  mediaQuery: "min",
  fixedWidth: "206px",
  width: "375px",
  gap: "26px",
  breakpoints: {
    560: {
      perPage: 1,
    },
    1119: {
      perPage: 1,
      padding: "0rem",
      fixedWidth: "312px",
      width: "650px",
    },
  },
});
maisonSlider.mount();

const maisonCulteSlider = new Splide(".maison-culte__splide", {
  focus: "center",
  type: "loop",
  perPage: 1,
  perMove: 1,
  mediaQuery: "min",
  width: "405px",
  fixedWidth: "250px",
  gap: "11px",
  breakpoints: {
    712: {
      perPage: 2,

      gap: "11px",
    },
    1119: {
      perPage: 3,

      fixedWidth: "340px",
      width: "700px",
      // gap: "10rem",
    },
  },
});
maisonCulteSlider.mount();

const selebritesSplide = new Splide(".selebrites__slider", {
  type: "loop",
  perPage: 5,
  perMove: 1,
  gap: "4px",
  breakpoints: {
    559: { perPage: 2 },
    991: { perPage: 3 },
  },
});
selebritesSplide.mount();

const body = document.querySelector("body");
window.addEventListener("load", function (e) {
  body.classList.remove("global-preload");
});

// <!-- Initialize Swiper -->
var swiper2 = new Swiper(".mySwiperCosmatic", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

// <!-- Initialize Swiper -->
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    1440: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  },
});

const stepsSplide = new Splide(".steps-splide", {
  focus: "center",
  type: "loop",
  perPage: 1,
  perMove: 1,
  mediaQuery: "min",
  width: "405px",
  fixedWidth: "250px",
  gap: "11px",
  breakpoints: {
    320: {
      gap: "2px",
      perPage: 1.2,
      padding: "0rem",
      fixedWidth: "300px",
      width: "100%",
    },
    728: {
      perPage: 2,
      padding: "0rem",
      fixedWidth: "280px",
      width: "689px",
    },
    998: {
      perPage: 2,
      padding: "0rem",
      fixedWidth: "380px",
      width: "868px",
    },
    1024: {
      perPage: 3,
      padding: "0rem",
      fixedWidth: "312px",
      width: "1026px",
    },
  },
});
stepsSplide.mount();
