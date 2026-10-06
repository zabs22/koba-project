/*
 * KOBA Patisserie & Bakery — public website interactions.
 * Dependency-free. Page-specific modules load on demand.
 */
import { $ } from './site/util';
import { initLoader, initCurtain, initHeader, initOverlayMenu, initCursor } from './site/shell';
import { initReveals, initParallax, initHeroParallax, initScrub, initManifesto } from './site/motion';
import { initTabs, initPrinciples, initLocations, initFeatures, initCarousels, initMarquees, initHeroSliders } from './site/components';

initCurtain();
initHeader();
initOverlayMenu();
initCursor();
initTabs();
initPrinciples();
initLocations();
initFeatures();
initHeroSliders();
initCarousels();
initMarquees();
initParallax();
initHeroParallax();
initScrub();
initManifesto();

initLoader(() => initReveals());

if ($('[data-order-form]')) import('./site/order').then((m) => m.initOrderForm());
if ($('[data-enquiry-form]')) import('./site/enquiry').then((m) => m.initEnquiryForms());
if ($('[data-menu-search]')) import('./site/menu').then((m) => m.initMenu());
if ($('[data-cake-dialog]')) import('./site/cakes').then((m) => m.initCakes());
