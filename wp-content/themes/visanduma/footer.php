<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly      ?>
</div>
<div id="footer">
    <footer>
        <div class='social-links'>
            <a href='#' class='facebook'>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
            </a>
            <a href='#' class='mail'>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                </svg>
            </a>
            <a href='#' class='whatsapp'>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg>
            </a>
        </div>
        <div class="container footer-txt">
           &copy; <?php echo date('Y');?> <?php echo get_theme_mod('copyright_text', 'Default copyright message'); ?>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
<script>
    const images = document.querySelectorAll('.image');
    const modal = document.querySelector('.img-modal');
    const modalImg = document.querySelector('.modal-img');

    images.forEach((image) => {
      image.addEventListener('click', () => {
        modal.style.display = 'flex';
        modalImg.src = image.querySelector('img').src;
      });
    });

    modal.addEventListener('click', () => {
      modal.style.display = 'none';
    });
    document.addEventListener("DOMContentLoaded", function(){
        $(function() {
            $('.lazy').Lazy({
                loadingClass: 'loading',
                scrollDirection: 'vertical',
                effect: 'fadeIn',
                visibleOnly: true,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                }
            });
        });
    });
    $(document).ready(function() {

        var headerHeight = $(this).find("header").outerHeight(true);
        var footerHeight = $(this).find("#footer").outerHeight(true);
        var windowHeight = $(window).height();
        var availableArea = windowHeight - (headerHeight + footerHeight);
        document.getElementById("mainwrapper").style.minHeight = availableArea + "px";

        AOS.init();
       
        $('.featured-tours').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            arrows: false,
            dots: true,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    settings: {
                        fade: true,
                        cssEase: 'linear',
                        dots: true,
                        slidesToShow: 2
                    }
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    settings: {
                        fade: true,
                        cssEase: 'linear',
                        dots: true,
                        slidesToShow: 2
                    }
                }
            }, {
                breakpoint: 650,
                settings: {
                    slidesToShow: 1,
                    settings: {
                        fade: true,
                        cssEase: 'linear',
                        dots: true,
                        slidesToShow: 1
                    }
                }
            }]
        });

    });
</script>
</body>
</html>