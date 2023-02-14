"use sctrict";

const yearEl = document.querySelector(".year");
const currentYear = new Date().getFullYear();
yearEl.textContent = currentYear;

const btnNavEl = document.querySelectorAll(".header__menu-btn");
const headerEl = document.querySelector(".header");

btnNavEl.forEach((btn) => btn.addEventListener("click", () => headerEl.classList.toggle("nav-open")));

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
  padding: { left: "3em", right: "4em" },
  breakpoints: {
    560: {
      perPage: 2,
      padding: { left: "5.2em", right: "5.2em" },
      gap: "5rem",
    },
    1119: {
      perPage: 3,
      padding: "0rem",
      width: "940px",
    },
  },
});
maisonSlider.mount();

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

// const arrows = document.querySelectorAll(".maison__arrows");
// arrows.forEach((arrow) => {
//   arrow.addEventListener("click", (e) => {
//     const maisonSliderList = document.querySelectorAll(".maison__slide");
//     maisonSliderList.forEach((slide) => {
//       if (slide.classList.contains("is-visible" && "is-active")) {
//         console.log(12);
//       }
//     });
//   });
// });
let selSlidesMain = document.querySelectorAll('.selebrites__slide');
let selSlide1 = document.querySelector('.selebrites__slide1');
let selSlide2 = document.querySelector('.selebrites__slide2');
let selSlide3 = document.querySelector('.selebrites__slide3');
let selSlide4 = document.querySelector('.selebrites__slide4');
let selSlide5 = document.querySelector('.selebrites__slide5');
let selCaptions1 = document.querySelector('.selebrites-caption1');
let selCaptions2 = document.querySelector('.selebrites-caption2');
let selCaptions3 = document.querySelector('.selebrites-caption3');
let selCaptions4 = document.querySelector('.selebrites-caption4');
let selCaptions5 = document.querySelector('.selebrites-caption5');
let selName1 = document.querySelector('.selebrites__name1');
let selName2 = document.querySelector('.selebrites__name2');
let selName3 = document.querySelector('.selebrites__name3');
let selName4 = document.querySelector('.selebrites__name4');
let selName5 = document.querySelector('.selebrites__name5');

function sel() {
  if (selSlide1.classList.contains("is-active")) {
    selCaptions1.classList.remove('remove');
    selName1.classList.remove('remove');
  }
  else {

    selCaptions1.classList.add('remove');
    selName1.classList.add('remove');
  }
}
setInterval(sel, 500);

function sel2() {
  if (selSlide2.classList.contains("is-active")) {
    selCaptions2.classList.remove('remove');
    selName2.classList.remove('remove');
  }
  else {

    selCaptions2.classList.add('remove');
    selName2.classList.add('remove');
  }
}
setInterval(sel2, 500);

function sel3() {
  if (selSlide3.classList.contains("is-active")) {
    selCaptions3.classList.remove('remove');
    selName3.classList.remove('remove');
  }
  else {

    selCaptions3.classList.add('remove');
    selName3.classList.add('remove');
  }
}
setInterval(sel3, 500);

function sel4() {
  if (selSlide4.classList.contains("is-active")) {
    selCaptions4.classList.remove('remove');
    selName4.classList.remove('remove');
  }
  else {

    selCaptions4.classList.add('remove');
    selName4.classList.add('remove');
  }
}
setInterval(sel4, 500);

function sel5() {
  if (selSlide5.classList.contains("is-active")) {
    selCaptions5.classList.remove('remove');
    selName5.classList.remove('remove');
  }
  else {

    selCaptions5.classList.add('remove');
    selName5.classList.add('remove');
  }
}
setInterval(sel5, 500);


