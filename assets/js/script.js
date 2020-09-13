function dom(el) {
    return document.querySelector(el);
}
const navButton = dom('.nav-button');
const menuxs = dom('.menu-xs');
const closemenuxs = dom('.close-menu-xs');
const images = dom('.images');
const image = dom('.image');
const slider = dom('.sliders');
const prevBtnSlider = dom('.prev-btn-slider');
const nextBtnSlider = dom('.next-btn-slider');

navButton.addEventListener('click', function () {
    menuxs.classList.toggle('d-block');
});
closemenuxs.addEventListener('click', function () {
    menuxs.classList.toggle('d-block');
});
// deklar buat next image
let nextImage = 0;
// deklar buat image yang aktif
let activeImage = 0;
// fungsi buat ganti image per 5 detik
let changeSlider = setInterval(function () {
    // cek semua image
    for (let i = 0; i < image.children.length; i++) {
        // jika dia terdapat kelas aktif 
        if (image.children[i].classList.contains('active')) {
            // gambar aktifnya
            activeImage = i;
            // next gambar
            if ((parseInt(image.children.length) - 1) == i) {
                nextImage = 0;
            } else {
                nextImage = (activeImage + 1);
            }
        }
    }
    // remove kelas active di gambar yang sedang aktif
    image.children[activeImage].classList.remove('active');
    // add kelas aktif di next gambar
    image.children[nextImage].classList.add('active');
}, 10000);
// jika tombol prev di klik
prevBtnSlider.addEventListener('click', () => {
    if (activeImage == 0) {
        nextImage = (image.children.length - 1);
        // remove kelas active di gambar yang sedang aktif
        image.children[activeImage].classList.remove('active');
        // add kelas aktif di next gambar
        image.children[nextImage].classList.add('active');
        activeImage = nextImage;
        clearTimeout(changeSlider);
    } else {
        nextImage = (activeImage - 1);
        // remove kelas active di gambar yang sedang aktif
        image.children[activeImage].classList.remove('active');
        // add kelas aktif di next gambar
        image.children[nextImage].classList.add('active');
        activeImage = nextImage;
    }
});
nextBtnSlider.addEventListener('click', () => {
    if (activeImage == (image.children.length - 1)) {
        nextImage = 0;
        // remove kelas active di gambar yang sedang aktif
        image.children[activeImage].classList.remove('active');
        // add kelas aktif di next gambar
        image.children[nextImage].classList.add('active');
        activeImage = nextImage;
    } else {
        nextImage = (activeImage + 1);
        // remove kelas active di gambar yang sedang aktif
        image.children[activeImage].classList.remove('active');
        // add kelas aktif di next gambar
        image.children[nextImage].classList.add('active');
        activeImage = nextImage;
    }
});