<?php
/**
 * Template part for displaying posts
 *
 *
 * @package WordPress
 * @subpackage Seneview_Template
 * @since 2.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if (is_sticky() && is_home()) :
        echo 'Sticky post';
    endif;
    ?>
    <header class="entry-header">
        <?php
        if ('post' === get_post_type()) {
            echo '<div class="entry-meta-date">';
            if (is_single()) {
                echo get_the_time('F d, Y') . ' By ' . get_the_author();
            }
            echo '</div><!-- .entry-meta -->';
        }

        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } elseif (is_front_page() && is_home()) {
            the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content(sprintf(
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>'), get_the_title()
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:'),
            'after' => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after' => '</span>',
        ));
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
