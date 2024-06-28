document.addEventListener('DOMContentLoaded', (event) => {
    var popup = document.querySelector('.popup');
    if (popup) {
        setTimeout(function() {
            popup.style.display = 'block';
            setTimeout(function() {
                popup.style.display = 'none';
            }, 9000); 
        }, 700); 
    }
});

document.addEventListener('DOMContentLoaded', (event) => {
    var popu = document.querySelector('.jedi');
    if (popu) {
        setTimeout(function() {
            popu.style.display = 'block';
            setTimeout(function() {
                popu.style.display = 'none';
            }, 3000); 
        }, 700); 
    }
});