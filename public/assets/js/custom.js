(function ($) {
    "use strict";

    window.onerror = function (message, source, lineno, colno, error) {
        console.error(`Message d'erreur : ${message}`);
        console.error(`Source : ${source}`);
        console.error(`Ligne : ${lineno}, Colonne : ${colno}`);
        console.error(`Erreur détaillée :`, error);
    };


    // Page loading animation
    $(window).on('load', function () {
        $('#js-preloader').addClass('loaded');

        if ($('.cover').length) {
            $('.cover').parallax({
                imageSrc: $('.cover').data('image'),
                zIndex: '1'
            });
        }

        $("#preloader").animate({
            'opacity': '0'
        }, 600, function () {
            setTimeout(function () {
                $("#preloader").css("visibility", "hidden").fadeOut();
            }, 300);
        });
    });

    // WOW JS animation initialization
    $(window).on('load', function () {
        if ($(".wow").length) {
            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 20,
                mobile: true,
                live: true,
            });
            wow.init();
        }
    });

    // Header background toggle on scroll
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var box = $('.header-text').height();
        var header = $('header').height();

        if (scroll >= box - header) {
            $("header").addClass("background-header");
        } else {
            $("header").removeClass("background-header");
        }
    });

    // Filters with validation
    $('.filters ul li').click(function () {
        $('.filters ul li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');

        if (data && /^[.#][\w-]+$/.test(data)) { // Validation du sélecteur
            $grid.isotope({
                filter: data
            });
        } else {
            console.error("Filtre non valide : ", data);
        }
    });

    // Isotope grid
    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: true,
        masonry: {
            columnWidth: ".all"
        }
    });

    // Reload on window resize
    var width = $(window).width();
    $(window).resize(function () {
        if (width > 992 && $(window).width() < 992) {
            location.reload();
        } else if (width < 992 && $(window).width() > 992) {
            location.reload();
        }
    });

    // Accordion menu behavior
    $(document).on("click", ".naccs .menu div", function () {
        var numberIndex = $(this).index();

        if (!$(this).is("active")) {
            $(".naccs .menu div").removeClass("active");
            $(".naccs ul li").removeClass("active");

            $(this).addClass("active");
            $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

            var listItemHeight = $(".naccs ul")
                .find("li:eq(" + numberIndex + ")")
                .innerHeight();
            $(".naccs ul").height(listItemHeight + "px");
        }
    });

    // Owl Carousel initialization
    $('.owl-features').owlCarousel({
        items: 3,
        loop: true,
        dots: false,
        nav: true,
        autoplay: true,
        margin: 30,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1200: { items: 3 },
            1800: { items: 3 }
        }
    });

    $('.owl-collection').owlCarousel({
        items: 3,
        loop: true,
        dots: false,
        nav: true,
        autoplay: true,
        margin: 30,
        responsive: {
            0: { items: 1 },
            800: { items: 2 },
            1000: { items: 3 }
        }
    });

    $('.owl-banner').owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        nav: true,
        autoplay: true,
        margin: 30,
        responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 1 }
        }
    });

    // Menu dropdown toggle
    if ($('.menu-trigger').length) {
        $(".menu-trigger").on('click', function () {
            $(this).toggleClass('active');
            $('.header-area .nav').slideToggle(200);
        });
    }

    // Smooth scroll for anchors
    $('.scroll-to-section a').on('click', function (e) {
        var href = $(this).attr('href');

        if (!href) {
            console.error("Lien sans href détecté.");
            return;
        }

        try {
            var url = new URL(href, window.location.origin);
            var hash = url.hash;

            if (hash && $(hash).length) {
                e.preventDefault();
                var target = $(hash);
                $('html, body').animate({
                    scrollTop: target.offset().top - 79
                }, 700);
            } else {
                console.log("Navigation normale vers : ", href);
            }
        } catch (error) {
            console.error("Erreur avec l'URL : ", href, error);
        }
    });

    // Update active links on scroll
    function onScroll(event) {
        var scrollPos = $(document).scrollTop();
        $('.nav a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position() && refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.nav ul li a').removeClass("active");
                currLink.addClass("active");
            } else {
                currLink.removeClass("active");
            }
        });
    }

    $(document).ready(function () {
        $(document).on("scroll", onScroll);
    });

    // Dropdown menu opener
    const dropdownOpener = $('.main-nav ul.nav .has-sub > a');

    if (dropdownOpener.length) {
        dropdownOpener.each(function () {
            var _this = $(this);

            _this.on('tap click', function (e) {
                var thisItemParent = _this.parent('li'),
                    thisItemParentSiblingsWithDrop = thisItemParent.siblings('.has-sub');

                if (thisItemParent.hasClass('has-sub')) {
                    var submenu = thisItemParent.find('> ul.sub-menu');

                    if (submenu.is(':visible')) {
                        submenu.slideUp(450, 'easeInOutQuad');
                        thisItemParent.removeClass('is-open-sub');
                    } else {
                        thisItemParent.addClass('is-open-sub');

                        if (thisItemParentSiblingsWithDrop.length === 0) {
                            thisItemParent.find('.sub-menu').slideUp(400, 'easeInOutQuad', function () {
                                submenu.slideDown(250, 'easeInOutQuad');
                            });
                        } else {
                            thisItemParent.siblings().removeClass('is-open-sub').find('.sub-menu').slideUp(250, 'easeInOutQuad', function () {
                                submenu.slideDown(250, 'easeInOutQuad');
                            });
                        }
                    }
                }

                e.preventDefault();
            });
        });
    }
})(window.jQuery);
