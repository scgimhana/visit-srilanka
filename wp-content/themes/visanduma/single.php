<?php
/**
 * The template for displaying all single posts
 *
 *
 */
get_header();
?>
<div class="tour-single-mods">
    <div class="top-banner-sec mb-4" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)),url('<?php echo get_field('tour_banner_image'); ?>') center/cover no-repeat">
        <div class='container'>
            <h2 class='mb-2 text-light'><?php the_title(); ?></h2>
            <h6 class=' text-light'><?php the_field ('tour_duration_'); ?></h6>
        </div>
    </div>
    <div class='container'>
        <h3 class='mb-2'>Tour Description</h3>
        <div class='tour-description'><?php the_field ('tour_description'); ?></div>
        <?php
                if (have_rows('image_gallery')):?>
                <h3 class='px-3 text-center'>Image Gallery</h3>
                <div class="gallery mb-5">
                <?php
                    $counter = 1;
                    while (have_rows('image_gallery')): the_row();
                    $image = get_sub_field('image'); 
                    ?>
                        <div class="image">
                            <img src="<?php echo $image; ?>" alt="Image" class="lazy">
                        </div>
                    <?php
                     $counter ++;
                    endwhile;
                ?>
                </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
