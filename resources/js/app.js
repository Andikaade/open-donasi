

import Alpine from 'alpinejs';
// import './bootstrap';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.testimoni-slider')) {
        new Swiper('.testimoni-slider', {
            slidesPerView: 1,
            grid: { rows: 1, fill: 'row' },
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.testimoni-next',
                prevEl: '.testimoni-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    grid: { rows: 2, fill: 'row' },
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    grid: { rows: 2, fill: 'row' },
                    spaceBetween: 24,
                }
            }
        });
    }
});

window.openVideoModal = function (videoUrl) {
    document.getElementById('videoIframe').src = videoUrl + "?autoplay=1";
    document.getElementById('videoModal').classList.remove('hidden');
    document.getElementById('videoModal').classList.add('flex');
};

window.closeVideoModal = function () {
    document.getElementById('videoIframe').src = "";
    document.getElementById('videoModal').classList.remove('flex');
    document.getElementById('videoModal').classList.add('hidden');
};
