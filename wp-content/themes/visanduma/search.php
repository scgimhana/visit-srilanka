<?php
/*
 * Template Name: Search Template
 *  */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly  
get_header();
?>

<div class="container">
    <div class="search-wrap">
        <div class="row">
            <div class="col-sm-12">
                <header class="page-header">
                    <?php if (have_posts()) : ?>
                        <h1 class="page-title"><?php printf(__('Search Results for: %s'), '<span>' . get_search_query() . '</span>'); ?></h1>
                    <?php else : ?>
                        <h1 class="page-title"><?php _e('Nothing Found'); ?></h1>
                    <?php endif; ?>
                </header>
            </div>
        </div>


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

<?php get_footer(); ?>

    </div>
</div>
