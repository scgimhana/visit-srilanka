<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly  
/**
 * Custom built base theme by Visanduma Technologies (Private) Limited - Sri Lanka
 * 
 *
 * @package WordPress
 * @subpackage Visanduma_Base_Theme
 * @since 2015
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8" />
        <meta name="keywords" content="visanduma, software development, Web development"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
        <title>Visit SriLanka</title>
        <!--Favicon-->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400;500;700&family=Caveat:wght@400;700&family=WindSong:wght@500&display=swap" rel="stylesheet">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header class="header">
            <div class="header-wrapper">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                      <a href='<?php echo home_url(); ?>' class="navbar-brand" href="#">
                          #visit
                          <span>Sri Lanka</span>
                      </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                          <li class="nav-item">
                            <a href='<?php echo home_url();?>#aboutUs' class="nav-link active">About Us</a>
                          </li>
                          <li class="nav-item">
                            <a href='<?php echo home_url();?>/gallery' class="nav-link" href="#">Image Gallery</a>
                          </li>
                          <li class="nav-item">
                            <a href='<?php echo home_url();?>#tours' class="nav-link" href="#">Tours</a>
                          </li>
                          <li class="nav-item">
                            <a href='<?php echo home_url();?>#contact' class="nav-link" href="#">Contact Us</a>
                          </li>
                          <li class="nav-item d-none">
                            <?php echo do_shortcode( '[language-switcher]');?>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>
            </div>
        </header>
        <div id='mainwrapper'>