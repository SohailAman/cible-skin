import { request } from './request.js?v3';
import { recreateNode } from './utilities.js?v2';



// scrolling
let lastWindowScrollY = window.scrollY;


export function getScrollProgressFor(element, horizontal = false, clamp = false, round = false)
{
    let progressPercentage;

    if (horizontal) {
        const elementOffsetFromViewportRight = window.innerWidth - element.getBoundingClientRect().left;
        const elementScrollDistance = element.offsetWidth +  window.innerWidth;
        progressPercentage = elementOffsetFromViewportRight / elementScrollDistance * 100;
    } else {
        const elementOffsetFromViewportBottom = window.innerHeight - element.getBoundingClientRect().top;
        const elementScrollDistance = element.offsetHeight +  window.innerHeight;
        progressPercentage = elementOffsetFromViewportBottom / elementScrollDistance * 100;
    }

    if (clamp) {
        progressPercentage = Math.min(100, Math.max(0, progressPercentage));
    }

    if (round) {
        progressPercentage = Math.round(progressPercentage * 100) / 100;
    }

    return progressPercentage;
}


export function calcScrollEffectPercentage(scrollProgress, effectStart, effectEnd)
{
    let effectPercentage = (scrollProgress - effectStart) / (effectEnd - effectStart);
    effectPercentage = Math.min(1, Math.max(0, effectPercentage)); // [0, 1]
    return effectPercentage;
}



// header
const header = document.querySelector('header');
const headerSecondDeck = header.querySelector('.second-deck');
const headerIsWhite = header && header.classList.contains('white');

const productNav = header.querySelector('nav.products');
const elementShowingProductNav = header.querySelector('.shows-product-nav');
let mouseIsInsideProductNav = false;

const mdlpNav = header.querySelector('nav.mdlp');
const elementShowingMDLPNav = header.querySelector('.shows-mdlp-nav');
let mouseIsInsideMDLPNav = false;


window.addEventListener('scroll', function () {
    const windowScrollY = window.scrollY;

    if (headerSecondDeck.classList.contains('only-shown-at-top')) {
        if (windowScrollY > 0) {
            headerSecondDeck.classList.remove('show');
            productNav.classList.remove('show');
            mdlpNav.classList.remove('show');
        } else {
            headerSecondDeck.classList.add('show');
        }
    } else {
        if (windowScrollY > lastWindowScrollY) {
            headerSecondDeck.classList.remove('show');
            productNav.classList.remove('show');
            mdlpNav.classList.remove('show');
        } else {
            headerSecondDeck.classList.add('show');
        }
    }

    lastWindowScrollY = windowScrollY < 0 ? 0 : windowScrollY;
}, { passive: true });


if (elementShowingProductNav) {
    elementShowingProductNav.addEventListener('mouseenter', function () {
        productNav.classList.add('show');
    });

    productNav.addEventListener('mouseenter', function () {
        mouseIsInsideProductNav = true;
    });

    productNav.addEventListener('mouseleave', function () {
        mouseIsInsideProductNav = false;
        productNav.classList.remove('show');
    });

    headerSecondDeck.addEventListener('mouseleave', function () {
        setTimeout(function () {
            if (!mouseIsInsideProductNav) {
                productNav.classList.remove('show');
            }
        }, 100);
    });
}

if (elementShowingMDLPNav) {
    elementShowingMDLPNav.addEventListener('mouseenter', function () {
        mdlpNav.classList.add('show');
    });

    mdlpNav.addEventListener('mouseenter', function () {
        mouseIsInsideMDLPNav = true;
    });

    mdlpNav.addEventListener('mouseleave', function () {
        mouseIsInsideMDLPNav = false;
        mdlpNav.classList.remove('show');
    });

    headerSecondDeck.addEventListener('mouseleave', function () {
        setTimeout(function () {
            if (!mouseIsInsideMDLPNav) {
                mdlpNav.classList.remove('show');
            }
        }, 100);
    });
}
// Faq CollapsibleContent

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

// expandable items
export const expandables = document.querySelectorAll('.expandable');

export function toggleExpandable(expandable)
{
    const title = expandable.querySelector('.title');
    const expandIcon = title.querySelector('.icon.expand');
    const collapseIcon = title.querySelector('.icon.collapse');
    const collapsingContent = expandable.querySelector('.collapsing-content');
    const collapsingContentInnerHeight = collapsingContent.querySelector('.inner').clientHeight;

    if (!collapsingContent.style.height || collapsingContent.style.height === '0px') {
        collapsingContent.style.height = collapsingContentInnerHeight + 'px';
        expandIcon.classList.add('hidden');
        collapseIcon.classList.remove('hidden');
    } else {
        collapsingContent.style.height = '0px';
        collapseIcon.classList.add('hidden');
        expandIcon.classList.remove('hidden');
    }
}

if (expandables) {
    for (const expandable of expandables) {
        const title = expandable.querySelector('.title');

        title.addEventListener('click', () => {
            toggleExpandable(expandable);
        });
    }
}



// slideovers
const slideoverBackgroundMask = document.getElementById('slideover-background-mask');

if (slideoverBackgroundMask) {
    slideoverBackgroundMask.addEventListener('click', function () {
        const shownSlideovers = document.querySelectorAll('.slideover.show');

        for (const slideover of shownSlideovers) {
            slideover.classList.remove('show');
            this.classList.remove('show');
        }
    });
}


const menuSlideover = document.getElementById('menu-slideover');
const menuSlideoverShowButton = document.getElementById('menu-slideover-show-button');
const menuSlideoverCloseButton = document.getElementById('menu-slideover-close-button');

if (menuSlideover && menuSlideoverShowButton && menuSlideoverCloseButton) {
    menuSlideoverShowButton.addEventListener('click', () => {
        if (headerIsWhite) header.classList.remove('white');
        menuSlideover.classList.add('show');
        menuSlideoverShowButton.classList.add('hidden');
        menuSlideoverCloseButton.classList.remove('hidden');
    });

    menuSlideoverCloseButton.addEventListener('click', () => {
        if (headerIsWhite) header.classList.add('white');
        menuSlideover.classList.remove('show');
        menuSlideoverCloseButton.classList.add('hidden');
        menuSlideoverShowButton.classList.remove('hidden');
    });
}


const cartSlideover = document.getElementById('cart-slideover');
const cartSlideoverShowButtons = document.querySelectorAll('.cart-slideover-show-button');
const cartSlideoverCloseButton = document.getElementById('cart-slideover-close-button');
let cartSlideoverPartToUpdate = document.getElementById('cart-slideover-part-to-update');

function showCartSlideover() {
    cartSlideover.classList.add('show');
    slideoverBackgroundMask.classList.add('show');
}
function hideCartSlideover() {
    cartSlideover.classList.remove('show');
    slideoverBackgroundMask.classList.remove('show');
}

if (cartSlideover && cartSlideoverShowButtons && cartSlideoverCloseButton) {
    for (const cartSlideoverShowButton of cartSlideoverShowButtons) {
        cartSlideoverShowButton.addEventListener('click', function () {
            showCartSlideover();
        });
    }

    cartSlideoverCloseButton.addEventListener('click', function () {
        hideCartSlideover();
    });


    const cartSlideoverContinueShoppingLink = cartSlideover.querySelector('#free-delivery .back-link');
    if (cartSlideoverContinueShoppingLink) {
        cartSlideoverContinueShoppingLink.addEventListener('click', function (e) {
            e.preventDefault();
            hideCartSlideover();
        });
    }
}



// cart
async function reloadCart()
{
    try {
        if (!cartSlideover) {
            location.reload();
            return;
        }

        const newCartSlideoverHTML =
            await request('api/reload-cart', 'GET', null, false);
        const newCartSlideover = document.createRange().createContextualFragment(newCartSlideoverHTML);
        const newCartSlideoverPartToUpdate = newCartSlideover.getElementById('cart-slideover-part-to-update');

        cartSlideoverPartToUpdate.replaceWith(newCartSlideoverPartToUpdate);

        cartSlideoverPartToUpdate = document.getElementById('cart-slideover-part-to-update');
        updateAddToCartButtons();
        updateRemoveFromCartButtons();
        updateCartQuantityButtons();
    } catch (e) {
        console.error(e);
        location.reload();
    }
}



// add-to-cart
let addToCartButtons;

async function addToCartButtonsClickEventHandler()
{
    if (this.classList.contains('loading') || this.classList.contains('done') || this.classList.contains('disabled')) {
        return;
    }

    this.classList.add('loading');

    try {
        const data = await request('api/add-to-cart?id=' + this.dataset.variantId);
    } catch (e) {
        alert('L’opération a échoué.');
        this.classList.remove('loading');
        return;
    }

    this.classList.remove('loading');
    this.classList.add('done');
    setTimeout(() => {
        this.classList.remove('done');
    }, 2000);

    await reloadCart();
    if (cartSlideover) {
        showCartSlideover();
    }
}


function updateAddToCartButtons()
{
    addToCartButtons = document.querySelectorAll('button.add-to-cart');

    for (const addToCartButton of addToCartButtons) {
        addToCartButton.removeEventListener('click', addToCartButtonsClickEventHandler);
        if (!addToCartButton.classList.contains('disabled')) {
            addToCartButton.addEventListener('click', addToCartButtonsClickEventHandler);
        }
    }
}
updateAddToCartButtons();



// remove from cart
let removeFromCartButtons;

function updateRemoveFromCartButtons()
{
    removeFromCartButtons = document.querySelectorAll('button.remove-from-cart');

    for (const removeFromCartButton of removeFromCartButtons) {
        removeFromCartButton.addEventListener('click', async() => {
            customConfirm(
                'Êtes-vous sûr de vouloir supprimer ce produit ?',
                async function () {
                    try {
                        const data = await request('api/remove-from-cart?cart=' +
                            removeFromCartButton.dataset.cartId + '&line=' + removeFromCartButton.dataset.lineId);
                    } catch (e) {
                        alert('L’opération a échoué.');
                        return;
                    }

                    await reloadCart();
                }
            );
        });
    }
}
updateRemoveFromCartButtons();



// adjust cart quantities
let cartQuantityButtons;

function updateCartQuantityButtons()
{
    cartQuantityButtons = document.querySelectorAll('button.quantity-minus, button.quantity-add');

    for (const cartQuantityButton of cartQuantityButtons) {
        cartQuantityButton.addEventListener('click', async function () {
            if (this.classList.contains('disabled')) {
                return;
            }

            try {
                const data = await request('api/adjust-cart-quantity?cart=' + this.dataset.cartId +
                    '&line=' + this.dataset.lineId + '&quantity=' + this.dataset.targetQuantity);
            } catch (e) {
                alert('L’opération a échoué.');
                return;
            }

            await reloadCart();
        });
    }
}
updateCartQuantityButtons();



// error banners
const errorBanner = document.querySelector('.error-banner');
if (errorBanner) {
    const errorBannerDismissButton = errorBanner.querySelector('button.dismiss');
    errorBannerDismissButton.addEventListener('click', () => {
        errorBanner.remove();
    });
}


// info banners
const infoBanner = document.querySelector('.info-banner');
if (infoBanner) {
    window.addEventListener('load', function () {
        setTimeout(function () {
            // TODO: improve
            infoBanner.remove();
        }, 5000);
    });
}



// announcements
const announcementBar = document.querySelector('section.announcements');
if (announcementBar) {
    const announcements = announcementBar.querySelectorAll('.announcement');
    const announcementCount = announcements.length;

    setInterval(function () {
        const currentAnnouncement = announcementBar.querySelector('.announcement.show');
        let nextAnnouncement = currentAnnouncement.nextElementSibling;
        if (!nextAnnouncement) {
            nextAnnouncement = announcements[0];
        }
        currentAnnouncement.classList.remove('show');
        nextAnnouncement.classList.add('show');
    }, 4000);
}



// custom alert/confirmation
const alertConfirmation = document.getElementById('alert-confirmation');

if (alertConfirmation) {
    const alertConfirmationCancelButton = alertConfirmation.querySelector('button.cancel');
    alertConfirmationCancelButton.addEventListener('click', () => {
        alertConfirmation.classList.add('hidden');
    });
}

export function customConfirm(message, confirmationHandler)
{
    const alertConfirmationTitle = alertConfirmation.querySelector('.dialogue .title');
    let alertConfirmationConfirmButton = alertConfirmation.querySelector('button.confirm');

    alertConfirmationTitle.innerText = message;
    alertConfirmation.classList.remove('hidden');

    // remove all previous event listeners
    recreateNode(alertConfirmationConfirmButton, true);

    alertConfirmationConfirmButton = alertConfirmation.querySelector('button.confirm');
    alertConfirmationConfirmButton.addEventListener('click', confirmationHandler);
    alertConfirmationConfirmButton.addEventListener('click', () => {
        alertConfirmation.classList.add('hidden');
    });
}



// wish list
export function getWishListProducts(hasLoggedIn)
{
    if (hasLoggedIn) {
        return JSON.parse(document.documentElement.dataset.wishList || null);
    } else {
        return JSON.parse(localStorage.getItem('favourites'));
    }
}


export async function toggleWishListProduct(hasLoggedIn, productID, favouriteButton)
{
    let favourites = getWishListProducts(hasLoggedIn);
    if (!favourites) {
        favourites = [];
    }

    if (!favourites.includes(productID)) {
        // add
        if (hasLoggedIn) {
            try {
                const data = await request('api/add-to-wish-list?id=' + productID);
            } catch (e) {
                alert('L’opération a échoué.');
                return;
            }
        } else {
            favourites.push(productID);
        }

        updateFavouriteButtonIcon(favouriteButton, true);
    } else {
        // remove
        if (hasLoggedIn) {
            try {
                const data = await request('api/remove-from-wish-list?id=' + productID);
            } catch (e) {
                alert('L’opération a échoué.');
                return;
            }
        } else {
            favourites = favourites.filter(e => e !== productID);
        }

        updateFavouriteButtonIcon(favouriteButton, false);
    }

    localStorage.setItem('favourites', JSON.stringify(favourites));
}


export function updateFavouriteButtonIcon(button, toFull)
{
    const favouriteButtonImg = button.querySelector('img');
    favouriteButtonImg.src = toFull ? favouriteButtonImg.dataset.srcFull : favouriteButtonImg.dataset.srcEmpty;
}



// cookie consent
const cookieConsent = document.getElementById('cookie-consent');
if (cookieConsent) {
    const cookieConsentButtons = cookieConsent.querySelectorAll('button');
    for (const cookieConsentButton of cookieConsentButtons) {
        cookieConsentButton.addEventListener('click', async function (e) {
            localStorage.setItem('cookie-authorisation', this.dataset.cookieConsentValue);

            cookieConsent.classList.add('hidden');

            try {
                const data = await request('api/set-cookie-consent?type=' + this.dataset.cookieConsentValue);
            } catch (e) {
                alert('Un problème technique est survenu lors du stockage de votre préférence en matière de cookies. Veuillez réessayer plus tard.');
            }
        });
    }


    const cookieAuthorisation = localStorage.getItem('cookie-authorisation');
    if (!cookieAuthorisation) {
        showCookieConsent();
    }
}

function showCookieConsent()
{
    cookieConsent.classList.remove('hidden');
}



// password inputs
const showHidePasswordButtons = document.querySelectorAll('button.show-hide-password');

for (const showHidePasswordButton of showHidePasswordButtons) {
    showHidePasswordButton.addEventListener('click', function () {
        const passwordInput = this.previousElementSibling;
        passwordInput.type = passwordInput.type === 'text' ? 'password' : 'text';
    });
}

// soin pages

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

// <!-- Initialize Swiper -->
var swiperSteps = new Swiper(".mySwiperSteps", {
  slidesPerView: 1.2,
  spaceBetween: 30,
  centeredSlide: true,
  navigation: {
    nextEl: ".step-swiper-button-next",
    prevEl: ".step-swiper-button-prev",
  }, breakpoints: {
    640: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    998: {
      spaceBetween: 20,
      slidesPerView: 3,
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

