window.onload = function() {
    setTimeout(function() {
        const errorMessages = document.querySelectorAll('.error');
        errorMessages.forEach(function(error) {
            error.style.display = 'none';
        });
    }, 3000); // 3 detik setelah halaman dimuat
}
