export const root = document.documentElement;

export const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
export const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

export const $ = (selector, scope = document) => scope.querySelector(selector);
export const $$ = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));

export const clamp = (value, min = 0, max = 1) => Math.min(max, Math.max(min, value));
export const pad = (n) => String(n).padStart(2, '0');

/** Runs every registered callback once per animation frame while the page scrolls or resizes. */
const frameCallbacks = new Set();
let frameQueued = false;

function flush() {
    frameQueued = false;
    const vh = window.innerHeight;
    frameCallbacks.forEach((callback) => callback(vh));
}

export function onFrame(callback) {
    frameCallbacks.add(callback);
    queue();
}

export function queue() {
    if (!frameQueued) {
        frameQueued = true;
        requestAnimationFrame(flush);
    }
}

window.addEventListener('scroll', queue, { passive: true });
window.addEventListener('resize', queue, { passive: true });

export const storage = {
    get(key) {
        try { return sessionStorage.getItem(key); } catch { return null; }
    },
    set(key, value) {
        try { sessionStorage.setItem(key, value); } catch { /* storage unavailable */ }
    },
};
