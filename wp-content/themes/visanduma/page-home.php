<?php
/**
* Template Name: Home
 */
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly
get_header();
?>
<div id="mainwrapper" class="home-mods">
    <a id="top"></a>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">            
            <div class="carousel-caption d-none d-md-block" data-aos="fade-up">
              <h1>Sri Lanka</h1>
            </div>
            <?php
                if (have_rows('top_slider')):
                    $counter = 1;
                    while (have_rows('top_slider')): the_row();
                    $sliderImage = get_sub_field('slider_image'); 
                    ?>
                        <div class="carousel-item <?php echo ($counter === 1) ? 'active' : ''; ?>" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)),url('<?php echo $sliderImage; ?>') center/cover no-repeat">
                        </div>
                    <?php
                     $counter ++;
                    endwhile;
                endif;
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class='row my-5 py-5'>
            <div class='col-lg-6' id='aboutUs'>
                <h2><?php echo get_field('about_us_title'); ?></h2>
                <?php the_field('about_us_text'); ?>
                <a href='<?php echo home_url();?>/#tours' class='main-btn'>More Tours</a>
            </div>
            <div class='col-lg-6 mt-4 mt-lg-0'>
                <img class='w-100 rounded'src="<?php echo get_field('about_us_side_image'); ?>" alt="alt"/>
            </div>
        </div>
        <div class='row mb-3 pb-4'>
            <h2 class='px-3 text-center'><?php echo get_field('why_choose_title'); ?></h2>
            <?php
                if (have_rows('why_choose_cards')):
                    while (have_rows('why_choose_cards')): the_row();
                    ?> 
                        <div class='col-lg-4 col-md-6 mb-3 mb-lg-4'>
                            <div class='shadow-card'>
                                <div class='title'><?php echo get_sub_field('title'); ?></div>
                                <div class='text'><?php echo get_sub_field('text'); ?></div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
            ?>
        </div>
        <h2 class='px-3 text-center' id='imageGallery'>Image Gallery</h2>
        <div class="gallery mb-5">
            <?php
                if (have_rows('gallery')):
                    while (have_rows('gallery')): the_row();
                    $classlist = get_sub_field_object( 'class' )['value'];
                    $class = [];
                    if( is_array($classlist) ) {
                        foreach( $classlist as  $choice ) {
                            $class[] =$choice['value'];
                        }
                    }
                    ?> 
                        <div class="image <?php echo implode( ' ', $class); ?> show">
                           <img data-src="<?php echo get_sub_field('image'); ?>" alt="Image" class="lazy">
                        </div>
                    <?php
                    endwhile;
                endif;
            ?>
        </div>
        <a href='<?php echo home_url();?>/gallery' class='main-btn mx-auto mb-5'>See More</a>
        <h2 class='px-3 text-center mb-5' id='tours'>Featured Tours</h2>
        <section class="featured-tours mb-5">
            <?php
              $args = array( 
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'post_type' => 'tours', );
                $packages = get_posts( $args );
                foreach ( $packages as $post ) : setup_postdata( $post ); 
                    if ( has_post_thumbnail() ) {
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $image_url = $image[0];
                    }
                ?>
                    <a href="<?php the_permalink(); ?>" class="travel-card" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)),url('<?php echo $image_url ;?>') center/cover no-repeat;">
                        <div class='travel-card-inner-sec'>
                            <div>
                                <div class="title"><?php the_title(); ?></div>
                                <div class="content">
                                    <?php the_field ('tour_duration_', $post->ID); ?><br/>
                                    <span><?php the_field ('tour_short_description', $post->ID); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                 <?php endforeach; 
                wp_reset_postdata(); ?>
        </section>
        <div class='row mb-5'>
            <div class='d-none d-lg-flex align-items-center justify-content-center col-lg-6'>
                <img src="<?php echo get_template_directory_uri(); ?>/images/sri-lanka-doodles-illustration.jpg" alt="alt" class='mx-auto'/>
            </div>
            <div class='col-lg-6' id='contact'>
                <h2 class='mb-4'>Contact Us</h2>
                <form action="" class='contact-form'>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingSubject" placeholder="Subject">
                        <label for="floatingSubject">Subject</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea" style="height: 150px"></textarea>
                        <label for="floatingTextarea">Message</label>
                    </div>
                    <button class='main-btn'>Send Message</button>
                    <i class="bi bi-facebook"></i>
                </form>
            </div>
        </div>
    </div>   
    <div class="img-modal">
        <span class="close">&times;</span>
        <img class="modal-img">
    </div>
    
</div>
<?php

//function wp_home_hook() {
//    include_once(get_template_directory() . '/js/home.js.php');
//}
//add_action('wp_footer', 'wp_home_hook');
get_footer();

