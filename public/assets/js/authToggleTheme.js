let themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
let themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');

// Change the icons inside the button based on previous settings
getUserTheme().then(data => {
    if (data) {
        if (data.theme[0].theme === 'dark') {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }
    }
});


let themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function () {
    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');
    let result = getUserTheme().then(data => {
        if (data) {
            return data.theme[0].theme;
        }
    });
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        sendUpdateRequest('light');
        localStorage.setItem('color-theme', 'light');
    } else {
        document.documentElement.classList.add('dark');
        sendUpdateRequest('dark');
        localStorage.setItem('color-theme', 'dark');
    }
});


function sendUpdateRequest(themeMode) {
    fetch('/toggle-theme', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({theme: themeMode}),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function getUserTheme() {
    return fetch('/get-user-theme', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
        .then(response => {
            if (!response.ok) {
                return null;
            }
            return response.json();
        })
        .then(data => {
            return data;
        })
        .catch((error) => {
            return null;
        });
}

