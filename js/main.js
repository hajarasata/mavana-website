(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-dark shadow');
            } else {
                $('.fixed-top').removeClass('bg-dark shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-dark shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-dark shadow').css('top', 0);
            }
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Causes progress
    $('.causes-progress').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        center: true,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    });

    // Toggle pour afficher/masquer le mot de passe du webmail
    // On vérifie d'abord si le bouton existe sur la page pour éviter les erreurs
    if ($('#toggle-password-btn').length) {
        $('#toggle-password-btn').on('click', function () {
            var passwordDisplay = $('#webmail-password');
            var passwordIcon = $('#toggle-password-icon');
            
            // On récupère le vrai mot de passe stocké dans l'attribut data-password
            var realPassword = passwordDisplay.data('password');

            // On vérifie si le mot de passe est actuellement masqué
            if (passwordIcon.hasClass('bi-eye-slash')) {
                // Si masqué, on l'affiche
                passwordDisplay.text(realPassword);
                passwordIcon.removeClass('bi-eye-slash').addClass('bi-eye');
            } else {
                // Si visible, on le masque
                passwordDisplay.text('************');
                passwordIcon.removeClass('bi-eye').addClass('bi-eye-slash');
            }
        });
    }
	
})(jQuery);

