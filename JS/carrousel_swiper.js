document.addEventListener("DOMContentLoaded", function () {
    const swiperContainer = document.querySelector('.swiper .swiper-wrapper');

    // Vérifie si le carrousel existe, sinon arrête l'exécution du script
    if (!swiperContainer) {
        return;
    }

    let slides = swiperContainer.children;
    const slideCount = slides.length;
    const minSlides = 4;

    if (slideCount < minSlides) {  
        for (let i = 0; i < minSlides - slideCount; i++) {
            let clone = slides[i % slideCount].cloneNode(true);
            swiperContainer.appendChild(clone);
        }
    }

    new Swiper('.swiper', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 800,
        effect: "coverflow",
        loop: true,
        loopedSlides: minSlides,
        watchOverflow: true,
        coverflowEffect: {
            rotate: 60,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });
});