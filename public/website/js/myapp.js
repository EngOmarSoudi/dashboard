function initSlider(){
        // slider_header
        $('.slider_header').not('.slick-initialized').slick({
            autoplay: true,
            infinite: true,
            speed: 800,
            lazyLoad: 'progressive',
            arrows: true,
            dots: false,
            prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
        }).slickAnimation();

        $('.our_products').not('.slick-initialized').slick({
            autoplay: true,
            infinite: true,
            speed: 800,
            lazyLoad: 'progressive',
            arrows: true,
            dots: true,
            prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
        }).slickAnimation();


        $('.slider_agriculture').not('.slick-initialized').slick({
            autoplay: true,
            infinite: true,
            speed: 800,
            lazyLoad: 'progressive',
            arrows: true,
            dots: false,
            prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
            nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
            slidesToShow: 4,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        autoplay: true,
                        infinite: true,
                        centerPadding: '40px',
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        autoplay: true,
                        infinite: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        }).slickAnimation();

        $('.slick-nav').on('click touch', function (e) {
            e.preventDefault();
            var arrow = $(this);
            if (!arrow.hasClass('animate')) {
                arrow.addClass('animate');
                setTimeout(() => {
                    arrow.removeClass('animate');
                }, 1600);
            }
        });
}

$(document).ready(function () {
   initSlider();
   setInterval(() => {
       initSlider();
   }, 500);
});

