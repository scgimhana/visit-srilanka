<script type="text/javascript">
    $(document).ready(function() {
        var headerHeight = $(this).find("header").outerHeight(true);
        var footerHeight = $(this).find("#footer").outerHeight(true);
        var windowHeight = $(window).height();
        var availableArea = windowHeight - (headerHeight + footerHeight);
        document.getElementById("mainwrapper").style.minHeight = availableArea + "px";

        AOS.init();

        var btn = $('#top');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
        });

        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
        });

    });
</script>