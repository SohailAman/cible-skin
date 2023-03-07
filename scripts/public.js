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