<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 *
 * @package WordPress
 * @subpackage Seneview_Template
 * @since 2.0
 * @version 1.0
 */
get_header();
?>
<div class="container">
    <div class="page-wrap">
        <div class="row">
            <div class="col-sm-12">

                <div class = "page-header">
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        <small><?php echo get_field('additional_title'); ?></small>
                    </header><!-- .entry-header -->
                </div>
                <div class="wrap">

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                            <?php
                            while (have_posts()) : the_post();

                                get_template_part('template-parts/page/content', 'page');

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>


        </div>

        <?php get_footer(); ?>
    </div>
</div>