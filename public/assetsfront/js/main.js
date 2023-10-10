(function ($) {
    "use strict";

    /*****************************
    * Commons Variables
    *****************************/
    var $window = $(window),
        $body = $('body');

    /****************************
    * Sticky Menu
    *****************************/
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
        } else {
            $(".sticky-header").addClass("sticky");
        }
    });


    /*****************************
    * Off Canvas Function
    *****************************/
    (function () {
        var $offCanvasToggle = $('.offcanvas-toggle'),
            $offCanvas = $('.offcanvas'),
            $offCanvasOverlay = $('.offcanvas-overlay'),
            $mobileMenuToggle = $('.mobile-menu-toggle');
        $offCanvasToggle.on('click', function (e) {
            e.preventDefault();
            var $this = $(this),
                $target = $this.attr('href');
            $body.addClass('offcanvas-open');
            $($target).addClass('offcanvas-open');
            $offCanvasOverlay.fadeIn();
            if ($this.parent().hasClass('mobile-menu-toggle')) {
                $this.addClass('close');
            }
        });
        $('.offcanvas-close, .offcanvas-overlay').on('click', function (e) {
            e.preventDefault();
            $body.removeClass('offcanvas-open');
            $offCanvas.removeClass('offcanvas-open');
            $offCanvasOverlay.fadeOut();
            $mobileMenuToggle.find('a').removeClass('close');
        });
    })();


    /**************************
     * Offcanvas: Menu Content
     **************************/
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $('.offcanvas-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.mobile-sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<div class="offcanvas-menu-expand"></div>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, .offcanvas-menu-expand', function (e) {
            var $this = $(this);
            if ($this.attr('href') === '#' || $this.hasClass('offcanvas-menu-expand')) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                    $this.parent('li').find('li').removeClass('active');
                    $this.parent('li').find('ul:visible').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });
    }
    mobileOffCanvasMenu();


    /******************************
     * Hero Slider - [Single Grid]
     *****************************/
    $('.hero-area-wrapper').slick({
        arrows: false,
        fade: true,
        autoplay: true,
        infinite: true,
        rtl: window.lang == 'ar',
        dots: true,
        easing: 'linear',
        speed: 2000,
    });

    /************************************************
     * Product Slider - Style: Default [4 Grid, 1 Row]
     ***********************************************/
    $('.product-default-slider-3grids-1row').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        rtl: window.lang == 'ar',
        dots: false,
        rows: 1,
        easing: 'ease-out',
        speed: 1000,
        prevArrow: '<button type="button" class="default-slider-arrow default-slider-arrow--left prevArrow"><i class="fa fa-angle-left"></button>',
        nextArrow: '<button type="button"  class="default-slider-arrow default-slider-arrow--right nextArrow"><i class="fa fa-angle-right"></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
        ]
    });

    /************************************************
     * Company logo Slider
     ***********************************************/
    $('.company-logo-slider').slick({
        autoplay: true,
        infinite: true,
        arrows: false,
        dots: false,
        easing: 'linear',
        speed: 1000,
        mobileFirst: true,
        rtl: window.lang == 'ar',
        // slidesToShow: 5,
        // slidesToScroll: 1,
        // responsive: [
        //     {
        //         breakpoint: 992,
        //         settings: {
        //             slidesToShow: 4
        //         }
        //     },
        //     {
        //         breakpoint: 768,
        //         settings: {
        //             slidesToShow: 3
        //         }
        //     },
        //     {
        //         breakpoint: 480,
        //         settings: {
        //             slidesToShow: 2
        //         }
        //     }
        // ]
    });
    /***********************************
    * Gallery - Horizontal
    ************************************/
    $('.product-large-image-horaizontal').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        rtl: window.lang == 'ar',

        fade: true,
        asNavFor: '.product-image-thumb-horizontal'
    });
    $('.product-image-thumb-horizontal').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        arrows: true,
        rtl: window.lang == 'ar',

        asNavFor: '.product-large-image-horaizontal',
        prevArrow: '<button type="button" class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-left prevArrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button"  class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-right nextArrow"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
    /***********************************
    * Gallery - Vertical
    ************************************/
    $('.product-large-image-vertical').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-image-thumb-vertical'
    });
    $('.product-image-thumb-vertical').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        arrows: true,
        rtl: window.lang == 'ar',

        vertical: true,
        asNavFor: '.product-large-image-vertical',
        prevArrow: '<button type="button" class="gallery-nav gallery-nav-vertical gallery-nav-vertical-up prevArrow"><i class="fa fa-angle-up"></i></button>',
        nextArrow: '<button type="button"  class="gallery-nav gallery-nav-vertical gallery-nav-vertical-down nextArrow"><i class="fa fa-angle-down"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });


    /********************************
    *  Product Gallery - Image Zoom
    **********************************/
    $('.zoom-image-hover').zoom();

    /***********************************
    * Gallery - Single Slider
    ************************************/
    $('.product-large-image-single-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        rtl: window.lang == 'ar',

        arrows: true,
        prevArrow: '<button type="button" class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-left prevArrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button"  class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-right nextArrow"><i class="fa fa-angle-right"></i></button>',
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    autoplay: true,
                    infinite: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    autoplay: true,
                    infinite: true,
                }
            }
        ]
    });

    /***********************************
    * Modal  Quick View Image
    ************************************/
    $('.modal-product-image-large').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.modal-product-image-thumb'
    });
    $('.modal-product-image-thumb').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        rtl: window.lang == 'ar',

        asNavFor: '.modal-product-image-large',
        focusOnSelect: true,
        prevArrow: '<button type="button" class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-left prevArrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button"  class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-right nextArrow"><i class="fa fa-angle-right"></i></button>',
    });
    $('.modal').on('shown.bs.modal', function (e) {
        $('.modal-product-image-large, .modal-product-image-thumb').slick('setPosition');
        $('.product-details-gallery-area').addClass('open');
    });

    /***********************************
    * Blog - Slider
    ************************************/
    $('.blog-image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        focusOnSelect: true,
        arrows: true,
        prevArrow: '<button type="button" class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-left prevArrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button"  class="gallery-nav gallery-nav-horizontal gallery-nav-horizontal-right nextArrow"><i class="fa fa-angle-right"></i></button>',
    });

    /***********************************
    * Testimonial - Slider
    ************************************/
    $('.testimonial-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        focusOnSelect: true,
        dots: true,
        arrows: false,
    });

    /************************************************
     * Nice Select
     ***********************************************/
    $('select').niceSelect();

    /************************************************
     * Price Slider
     ***********************************************/
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));


    /************************************************
     * Video  Popup
     ***********************************************/
    $('.video-play-btn').venobox();

    /************************************************
    * Animate on Scroll
    ***********************************************/
    AOS.init({
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        duration: 1000, // values from 0 to 3000, with step 50ms
        once: true, // whether animation should happen only once - while scrolling down
        easing: 'ease',
    });
    window.addEventListener('load', AOS.refresh);

    /************************************************
    * Hash Link Scroll To Top Prevent
    ***********************************************/
    $('a[href="#"]').on('click', (function (e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    }));

    /************************************************
     * Scroll Top
     ***********************************************/
    $('body').materialScrollTop();

    // Get the nameInput, fontColorInput, and other elements
    const nameInput = document.getElementById('nameInput');
    const fontColorInput = document.getElementById('fontColorInput');
    const imageThumbnails = document.querySelectorAll('.thumbnail');
    const outputImage = document.getElementById('outputImage');
    const downloadLink = document.getElementById('downloadLink');

    // Event listener for the thumbnail clicks
    imageThumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener('click', () => {
            imageThumbnails.forEach((t) => t.classList.remove('selected'));
            thumbnail.classList.add('selected');
            outputImage.src = thumbnail.src;

            // Show the nameInput, fontColorInput, and labels when an image is selected
            nameInput.style.display = 'block';
            fontColorInput.style.display = 'block';
            document.querySelectorAll('label[for="nameInput"]').forEach((label) => {
                label.style.display = 'block';
            });
            document.querySelectorAll('label[for="fontColorInput"]').forEach((label) => {
                label.style.display = 'block';
            });

            updateImage(); // Call the function to update the image with the name and font color
        });
    });

    // Event listener for input field changes
    nameInput.addEventListener('input', () => {
        updateImage(); // Call the function to update the image with the name and font color
    });

    // Event listener for font color changes
    fontColorInput.addEventListener('input', () => {
        updateImage(); // Call the function to update the image with the name and font color
    });

    // Function to update the image with the name and font color
    function updateImage() {
        const name = nameInput.value;
        const selectedImageSrc = document.querySelector('.thumbnail.selected')?.src;
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Set the canvas dimensions to a higher resolution (e.g., 1080 x 1080)
        canvas.width = 1080;
        canvas.height = 1080;

        const img = new Image();
        img.src = selectedImageSrc;

        img.onload = function () {
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height); // Scale the image to fit the canvas

            if (name.trim() !== '') {
                const fontColor = fontColorInput.value; // Get the selected font color
                ctx.font = '50px Almarai';
                ctx.fillStyle = fontColor; // Set the font color to the selected color

                // Center horizontally, move down by 20 pixels (adjust as needed)
                const textX = canvas.width / 2 - ctx.measureText(name).width / 2;
                const textY = canvas.height / 2 + 400; // Adjust the 20 as needed

                ctx.fillText(name, textX, textY);
            }

            const dataURL = canvas.toDataURL('image/jpeg', 1.0); // Set quality to 1.0 (maximum quality)
            downloadLink.href = dataURL;
            downloadLink.style.display = name.trim() !== '' ? 'block' : 'none';

            // Show the default image only if no other image is selected
            outputImage.style.display = selectedImageSrc != 'assetsfront/images/logo/logo-light.png' ? 'block' : 'none';

            // Check if no image is selected and hide the input elements and labels
            if (selectedImageSrc != 'assetsfront/images/logo/logo-light.png') {
                nameInput.style.display = 'block';
                fontColorInput.style.display = 'block';
                document.querySelectorAll('label[for="nameInput"]').forEach((label) => {
                    label.style.display = 'block';
                });
                document.querySelectorAll('label[for="fontColorInput"]').forEach((label) => {
                    label.style.display = 'block';
                });
            } else {
                nameInput.style.display = 'none';
                fontColorInput.style.display = 'none';
                document.querySelectorAll('label[for="nameInput"]').forEach((label) => {
                    label.style.display = 'none';
                });
                document.querySelectorAll('label[for="fontColorInput"]').forEach((label) => {
                    label.style.display = 'none';
                });
            }

            outputImage.src = dataURL; // Update the displayed image with the name and font color
        };
    }

    // Initially, call the updateImage function to set the initial image and hide the download link
    updateImage();

})(jQuery);
