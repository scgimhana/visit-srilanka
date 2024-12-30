<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 *
 * @package WordPress
 * @subpackage Seneview_Template
 * @since 2.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('st-excerpt'); ?>>

    <header class="entry-header">

        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        <a class="link-text" href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
        <?php if ('post' === get_post_type()) : ?>
            <span class="entry-meta">
                - <?php echo the_time('M d, Y'); ?>
            </span>
        <?php elseif ('page' === get_post_type() && get_edit_post_link()) : ?>

        <?php endif; ?>

    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <hr />
    <div class="post-details">
        <div class="row">
            <div class="col-sm-6">
                Written by: <?php the_author(); ?>
            </div>
            <?php if ('post' === get_post_type()) : ?>
            <div class="col-sm-6">
                Categories: <?php the_category(', '); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

</article><!-- #post-## -->