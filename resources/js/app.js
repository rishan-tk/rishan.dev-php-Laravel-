import Alpine from 'alpinejs';
import { initAnimations } from './animations.js';
import contactForm from './contact.js';
import terminal from './terminal.js';

Alpine.data('contactForm', contactForm);
Alpine.data('terminal', terminal);
window.Alpine = Alpine;
Alpine.start();

initAnimations();
