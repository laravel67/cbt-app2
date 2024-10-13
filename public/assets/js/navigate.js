// Fungsi untuk menginisialisasi event handler
function initializeMenuToggle() {
    const btnShow = $('#btn-show-menu');
    const menuShow = $('#side-menu');

    btnShow.on('click', function() {
        menuShow.removeClass('d-none');
        console.log('asansjab')
        // Jika Anda ingin menambahkan kelas 'layout-menu', gunakan baris di bawah ini
        // menuShow.addClass('layout-menu');
    });
}

// Panggil initializeMenuToggle saat document ready
$(document).ready(function() {
    initializeMenuToggle();
});

// Panggil initializeMenuToggle setiap kali ada navigasi dengan Livewire
document.addEventListener('livewire:navigate', function() {
    initializeMenuToggle();
});
