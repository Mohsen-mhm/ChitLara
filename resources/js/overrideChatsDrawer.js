import {Drawer} from 'flowbite';

// set the drawer menu element
const targetEl = document.getElementById('drawer-chat-list');

const options = {
    backdrop: false,
    onShow: () => {
        if (targetEl.classList.contains('-left-300')) {
            targetEl.classList.add('left-0')
            targetEl.classList.remove('-left-300')
        }
    },
    onHide: () => {
        if (targetEl.classList.contains('left-0')) {
            targetEl.classList.remove('left-0')
            targetEl.classList.add('-left-300')
            targetEl.classList.remove('-translate-x-full')
        }
    },
};

const instanceOptions = {
    id: 'drawer-chat-list',
    override: true
};

const drawer = new Drawer(targetEl, options, instanceOptions);
document.getElementById('drawer-chat-list-toggle').addEventListener('click', function () {
    if (drawer.isHidden()) {
        drawer.toggle()
    }
});
document.getElementById('drawer-hide-button').addEventListener('click', function () {
    if (drawer.isVisible()) {
        drawer.toggle()
    }
});
