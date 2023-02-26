"use strict";

const yearEl = document.querySelector(".year");
const currentYear = new Date().getFullYear();
yearEl.textContent = currentYear;

const btnNavEl = document.querySelectorAll(".header__menu-btn");
const headerEl = document.querySelector(".header");

btnNavEl.forEach((btn) =>
  btn.addEventListener("click", () => headerEl.classList.toggle("nav-open"))
);
const current = document.querySelector('#current');
const imgs = document.querySelectorAll('.hero__gallery-container img');
const opacity = 0.4;

imgs[0].style.opacity = opacity;

imgs.forEach(img => img.addEventListener('click', imgClick));

function imgClick(e) {
  imgs.forEach(img => (img.style.opacity = 1));
  current.src = e.target.src;
  current.classList.add('fade-in');
  setTimeout(() => current.classList.remove('fade-in'), 500);
  e.target.style.opacity = opacity;
}



// <!-- Initialize Swiper -->
var swiperMaisonMain = new Swiper(".swiperMaisonMain", {
  effect: "coverflow", loop: true,
  centeredSlides: true,
  grabCursor: true,
  slidesPerView: 1.4,
  spaceBetween: 30,
  speed: 500,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: false,
  },
  navigation: {
    nextEl: ".maison-main-swiper-button-next",
    prevEl: ".maison-main-swiper-button-prev",
  },
  breakpoints: {
    468: {
      slidesPerView: 1.5,
      spaceBetween: 30,
    },
    998: {
      slidesPerView: 1.6,
      spaceBetween: 30,
    },
    1240: {
      slidesPerView: 1.9,
      spaceBetween: 20,
    }
  }
});
// <!-- Initialize Swiper -->
var swiperGoogle = new Swiper(".swiperGoogle", {
  effect: "coverflow",
  loop: true,
  centeredSlides: true,
  grabCursor: true,
  slidesPerView: 1.4,
  spaceBetween: 15,
  speed: 500,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 1.8,
    slideShadows: false,
  },
  speed: 500,
  navigation: {
    nextEl: ".google-main-swiper-button-next",
    prevEl: ".google-main-swiper-button-prev",
  },
  breakpoints: {
    640: {
      spaceBetween: 30,
    },
    1020: {
      slidesPerView: 1.8,
      spaceBetween: 40,
    },
    1240: {
      slidesPerView: 1.8,
      spaceBetween: 40,
    }
  }
});



const selebritesSplide = new Splide(".selebrites__slider", {
  type: "loop",
  perPage: 5,
  perMove: 1,
  gap: "2px",
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
var swiperMaison = new Swiper(".swiperMaison", {
  effect: "coverflow",
  loop: true,
  centeredSlides: true,
  grabCursor: true,
  speed: 500,
  coverflowEffect: {
    rotate: 0,
    stretch: 20,
    depth: 120,
    modifier: 2.7,
    slideShadows: false,
  },
  navigation: {
    nextEl: ".maison-swiper-button-next",
    prevEl: ".maison-swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1.15,
      spaceBetween: 100,
    },
    480: {
      slidesPerView: 1.3,
      spaceBetween: 90,
    },
    768: {
      slidesPerView: 1.6,
      spaceBetween: 10,
    },
    1200: {
      slidesPerView: 1.8,
      spaceBetween: 10,
    }
  }
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
  slidesPerView: 1.4,
  spaceBetween: 5,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2.2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3.4,
      spaceBetween: 10,
    },
    1440: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  },
});

// <!-- Initialize Swiper -->
var swiperSteps = new Swiper(".mySwiperSteps", {
  slidesPerView: 1.5,
  spaceBetween: 30,
  // centeredSlides: true,
  navigation: {
    nextEl: ".step-swiper-button-next",
    prevEl: ".step-swiper-button-prev",
  }, breakpoints: {
    640: {
      spaceBetween: 20,
      slidesPerView: 1.9,
    },
    998: {
      spaceBetween: 10,
      slidesPerView: 2.9,
    },
  },
});


// -------
$(window).scroll(function () {
  if ($(this).scrollTop() > $(window).height() / 4) {
    $(".reservation").addClass("fixed");
  } else {
    $(".reservation").removeClass("fixed");
  }
});

$(window).scroll(function () {
  let target = $(".footer").offset().top;
  let currentScroll = $(target).scrollTop();

  if (currentScroll >= target) {
    $(".reservation").css({
      position: "initial",
      display: "none"
    });
  }
});

// Read more btns

let readMoreBtn = document.querySelectorAll('.readMoreBtn');
let elipsis = document.querySelectorAll('.elipsis');
let morePara = document.querySelectorAll('.morePara');

let viewed = false;

for (let i = 0; i < morePara.length; i++) {

  readMoreBtn[i].addEventListener('click', () => {
    if (viewed === false) {
      elipsis[i].style.display = "none";
      morePara[i].classList.remove('hideText');
      readMoreBtn[i].innerHTML = "Show less";
      viewed = true;
    }
    else {
      elipsis[i].style.display = "block";
      morePara[i].classList.add('hideText');
      readMoreBtn[i].innerHTML = "En savoir plus";
      viewed = false;
    }
  })

  elipsis[i].style.display = "block";
  morePara[i].classList.add('hideText');
  readMoreBtn[i].innerHTML = "En savoir plus";

}


// ---------slide text

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
// -----
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
// -----
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
// -----
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
// -----
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

// ***********
