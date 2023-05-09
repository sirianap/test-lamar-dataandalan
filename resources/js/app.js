import './bootstrap';
import './elements/turbo-echo-stream-tag';
import './libs/turbo';
import './libs/alpine';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
