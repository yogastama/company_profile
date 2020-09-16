function dom(el) {
    return document.querySelector(el);
}

function domAll(el) {
    return document.querySelectorAll(el);
}
const navButton = dom('.nav-button');
const menuxs = dom('.menu-xs');
const closemenuxs = dom('.close-menu-xs');
const images = dom('.images');
const image = dom('.image');
const slider = dom('.sliders');
const prevBtnSlider = dom('.prev-btn-slider');
const nextBtnSlider = dom('.next-btn-slider');
const btnPortfolio = Array.from(domAll('.btn-portfolio'));
const imagePortfolio = Array.from(domAll('.image-portfolio'));
const modalPreview = dom('.modal-preview');
navButton.addEventListener('click', function () {
    menuxs.classList.toggle('d-block');
});
closemenuxs.addEventListener('click', function () {
    menuxs.classList.toggle('d-block');
});
Array.prototype.remove = function () {
    var what, a = arguments,
        L = a.length,
        ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
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

function getOtherImagePortfolio(except) {
    let imagePortfolio = Array.from(domAll('.image-portfolio'));
    let otherImage = imagePortfolio.map((item, index) => {
        if (item.dataset.image !== except) {
            return item;
        }
    });
    return otherImage.remove(undefined);
}
// get data filter
const filterBtn = btnPortfolio.map((item) => {
    return item.dataset.filter;
})

// end get data filter
console.log(getOtherImagePortfolio('app'));
// portfolio slider
btnPortfolio.forEach((item, index) => {
    item.addEventListener('click', function () {
        if (this.dataset.filter != 'all') {
            // ambil semua image yang sesuai
            let imageFilter = domAll("[data-image=" + this.dataset.filter + "]");
            // jadikan flex
            imageFilter.forEach((image, indexImage) => {
                image.style.display = 'flex';
            });
            // other image
            let otherImageFilter = getOtherImagePortfolio(this.dataset.filter);
            otherImageFilter.forEach((oif, oik) => {
                oif.style.display = 'none';
            });
        } else {
            let imageFilter = domAll('.image-portfolio');
            imageFilter.forEach((ifv, ifk) => {
                ifv.style.display = 'flex';
            });
            // console.log(imageFilter);
        }
    });
});
// end portfolio slider

imagePortfolio.forEach((item, index) => {
    item.addEventListener('click', function () {
        let image = item.children[0].src;
        image = image.replace(window.location.protocol + '//' + window.location.host + '/', '');
        console.log(image);

        modalPreview.innerHTML = `<img src="/${image}">`;
        // set modal preview
        modalPreview.classList.add('d-flex');
    });
});
modalPreview.addEventListener('click', function () {
    this.classList.remove('d-flex');
});