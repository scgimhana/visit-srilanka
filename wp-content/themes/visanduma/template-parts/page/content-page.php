<?php
/**
 * Template part for displaying page content in page.php
 *
 *
 * @package WordPress
 * @subpackage Seneview_Template
 * @since 2.0
 * @version 1.0
 */
?>


<div class="body-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>  <!--body-container end-->