fetch('http://localhost/wordpress/wp-json/artistudio/v1/popup')
    .then(response => response.json())
    .then(data => {
        data.forEach(popup => {
            if (window.location.pathname.includes(popup.page)) {
                let popUpDiv = document.createElement('div');
                popUpDiv.classList.add('popup-overlay');
                popUpDiv.innerHTML = `
                    <div class="popup-content">
                        <h2 class="popup-text">${popup.title}</h2>
                        <div class="popup-text">${popup.description}</div>
                    </div>
                `;
                document.body.appendChild(popUpDiv);

                // Event: Klik di luar popup-content untuk menutup pop-up
                popUpDiv.addEventListener('click', function (event) {
                    if (event.target === popUpDiv) {
                        popUpDiv.remove();
                    }
                });
            }
        });
    })
    .catch(error => console.error('Fetch error:', error));
