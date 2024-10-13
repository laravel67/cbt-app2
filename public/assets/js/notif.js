function refreshAssets() {
    // Refresh CSS
    document.querySelectorAll('link[rel="stylesheet"]').forEach((link) => {
        const href = link.getAttribute('href');
        link.setAttribute('href', href.split('?')[0] + '?' + new Date().getTime());
    });
    // Refresh JS
    document.querySelectorAll('script[src]').forEach((script) => {
        const src = script.getAttribute('src');
        script.setAttribute('src', src.split('?')[0] + '?' + new Date().getTime());
    });
}
document.addEventListener('success', function(event) {
    const Url =event.detail[0].route;
    console.log(event.detail[0].message)
    Swal.fire({
        title: 'Sukses!',
        icon: 'success',
        'text':event.detail[0].message,
    }).then(() => {
        Livewire.navigate(Url, {
            preserveScroll: true,
            callback: () => {
                refreshAssets();
            }
        });
    });
});

window.addEventListener('show-delete-confirmation', function(event) {
    console.log(event.detail[0].listento); // Debug: Menampilkan nama event yang harus didengar
    const deleteConfirmed=event.detail[0].listento;
    Swal.fire({
        title: 'Kamu Yakin ?',
        text: "Tindakan ini akan menghapus data secara permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00b554',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Gunakan emit untuk memicu event Livewire
            Livewire.dispatch(deleteConfirmed);
        }
    });
});




// window.addEventListener('cofirmation-setStatus', event=>{
//     console.log(event.detail[0].title);
//     Swal.fire({
//         title: event.detail[0].title,
//         text: event.detail[0].text,
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#00b554',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Lanjutkan',
//         cancelButtonText: 'Batal'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             Livewire.dispatch(event.detail[0].status)
//         }
//     })
// });