new WOW().init();

document.addEventListener('DOMContentLoaded', function () {
    const scrollLinks = document.querySelectorAll('.scroll-link');

    scrollLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); 

            const href = this.getAttribute('href');
            if (href === '#') {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const backToTopButton = document.querySelector('.back-to-top');

    backToTopButton.classList.remove('show');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });

    backToTopButton.addEventListener('click', function (e) {
        e.preventDefault(); 
        window.scrollTo({
            top: 0,
            behavior: 'smooth' 
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const navItems = document.querySelectorAll('.navbar-nav .nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', function() {
            navItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
});




