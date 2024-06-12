document.addEventListener('DOMContentLoaded', (event) => {
    setTimeout(function() {
        var popup = document.querySelector('.jedi');
        if (popup) {
            popup.style.display = 'block';
            setTimeout(function() {
                popup.style.display = 'none';
            }, 11000); 
        }
    }, 1000); 
});

