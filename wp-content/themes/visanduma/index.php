<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package WordPress
 * @subpackage Visanduma
 * @since 2.0
 * @version 1.0
 */
get_header();
?>
<div class="container">
    <div class="blog-wrap">
        <?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php else : ?>
            <header class="page-header">
                <h2 class="page-title"><?php _e('Posts', 'Seneview_Template'); ?></h2>
            </header>
        <?php endif; ?>
        <div class="body-container">
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    while (have_posts()): the_post();
                        get_template_part('template-parts/post/content', 'excerpt');
                    endwhile;
                    ?>
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => __('<<'),
                        'next_text' => __('>>'),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page') . ' </span>',
                    ));
                    ?>
                </div>
                <div class="col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <?php get_footer(); ?>
    </div>
</div>