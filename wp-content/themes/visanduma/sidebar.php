<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Seneview_Template
 * @since 2.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'st_sidebar' ) ) {
	return;
}
?>

<aside class="sidebar" role="complementary">
	<?php dynamic_sidebar( 'st_sidebar' ); ?>
</aside><!-- #secondary -->
