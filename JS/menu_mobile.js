document.addEventListener('DOMContentLoaded', function () {
    const openButton = document.querySelector('.mobile_menu-open');
    const closeButton = document.querySelector('.mobile_menu-close');
    const mobileNav = document.querySelector('.mobile_nav');
    const menuLinks = document.querySelectorAll('.mobile_nav a');
    const menuList = document.querySelector('.mobile_nav ul');

    function checkWindowSize() {
        const windowWidth = document.documentElement.clientWidth;
        if (windowWidth <= 576) {
            mobileNav.classList.remove('open');
            openButton.classList.add("visible");
            closeButton.classList.remove("visible");
        } else {
            openButton.classList.remove("visible");
            closeButton.classList.remove("visible");
            mobileNav.classList.remove('open');
        }
    }

    checkWindowSize();
    window.addEventListener('resize', checkWindowSize);

    openButton.addEventListener('click', function (event) {
        if (document.documentElement.clientWidth > 576) return; // Bloque l'ouverture en desktop
        event.stopPropagation();
        mobileNav.classList.add('open');
        openButton.classList.remove("visible");
        closeButton.classList.add("visible");
    });

    closeButton.addEventListener('click', function () {
        mobileNav.classList.remove('open');
        closeButton.classList.remove("visible");
        openButton.classList.add("visible");
    });

    menuLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            mobileNav.classList.remove('open');
            closeButton.classList.remove("visible");
            openButton.classList.add("visible");
        });
    });

    document.addEventListener('click', function (event) {
        if (document.documentElement.clientWidth > 576) return; // Empêche toute interaction en desktop
        if (!mobileNav.contains(event.target) && !openButton.contains(event.target)) {
            mobileNav.classList.remove('open');
            closeButton.classList.remove("visible");
            openButton.classList.add("visible");
        }
    });

    menuList.addEventListener('click', function (event) {
        if (document.documentElement.clientWidth > 576) return;
        if (event.target === menuList) {
            mobileNav.classList.remove('open');
            closeButton.classList.remove("visible");
            openButton.classList.add("visible");
        }
    });
});
