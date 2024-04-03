import './bootstrap';
import 'flowbite';
import './overrideChatsDrawer.js';
import './handleChit.js';
import 'emoji-picker-element';
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start();

document.querySelector('emoji-picker')
    .addEventListener('emoji-click', event => document.getElementById('message-input').value += event.detail.unicode);
