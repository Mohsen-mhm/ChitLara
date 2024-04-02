let activeBox = document.getElementById('overflowed-active-box');
if (activeBox) {
    smoothScrollToBottom(activeBox, 500);
}
window.Echo.private(`chits.${window.uuid}`)
    .listen('.MessageSentEvent', (e) => {
        let savedActiveBox = document.getElementById('saved-message-box');
        savedActiveBox.insertAdjacentHTML('beforeend', e.view);
        document.getElementById('message-input').value = '';
        if (activeBox) {
            smoothScrollToBottom(activeBox, 1000);
        }
    });
