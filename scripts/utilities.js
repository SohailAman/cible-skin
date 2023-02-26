// colours
export function rgb2hex(rgb) {
    if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;

    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}


export const rgba2hex = (rgba) => `#${rgba.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+\.{0,1}\d*))?\)$/).slice(1).map((n, i) => (i === 3 ? Math.round(parseFloat(n) * 255) : parseFloat(n)).toString(16).padStart(2, '0').replace('NaN', '')).join('')}`;



export function colourInBetween(c0, c1, f) {
    c0 = c0.replace(/^#/, '').match(/.{1,2}/g).map((oct)=>parseInt(oct, 16) * (1-f));
    c1 = c1.replace(/^#/, '').match(/.{1,2}/g).map((oct)=>parseInt(oct, 16) * f);
    let ci = [0,1,2].map(i => Math.min(Math.round(c0[i]+c1[i]), 255));

    return ci.reduce((a,v) => ((a << 8) + v), 0).toString(16).padStart(6, "0");
}



// DOM
export function recreateNode(el, withChildren) {
    if (withChildren) {
        el.parentNode.replaceChild(el.cloneNode(true), el);
    }
    else {
        var newEl = el.cloneNode(false);
        while (el.hasChildNodes()) newEl.appendChild(el.firstChild);
        el.parentNode.replaceChild(newEl, el);
    }
}


export function getNextElementSiblingWithSelectorFor(elem, selector)
{
    let sibling = elem.nextElementSibling;

    if (!selector) {
        return sibling;
    }

    while (sibling) {
        if (sibling.matches(selector)) {
            return sibling;
        }
        sibling = sibling.nextElementSibling;
    }
}