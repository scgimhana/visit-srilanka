<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

    
//Theme customization options begin

class Visanduma_Customize {

    public static function register($wp_customize) {

        $wp_customize->add_section('visanduma_footer_section', array(
            'title' => __('Footer Area', 'visanduma_theme'),
            'priority' => 130,
        ));

        $wp_customize->add_section('visanduma_social_icons', array(
            'title' => __('Social Icon Links', 'visanduma_theme'),
            'priority' => 150,
        ));

        $wp_customize->add_setting('copyright_text', array('default' => '&copy; Visanduma R&D Solutions'));
        $wp_customize->add_control('copyright_text', array(
            'label' => __('Copyright Text', 'visanduma_theme'),
            'section' => 'visanduma_footer_section',
            'settings' => 'copyright_text',
            'type' => 'text',
                )
        );

        $wp_customize->add_setting('email_link', array('default' => 'support@gmail.com'));
        $wp_customize->add_control('email_link', array(
            'label' => __('Email', 'visanduma_theme'),
            'section' => 'visanduma_footer_section',
            'settings' => 'email_link',
            'type' => 'text',
                )
        );

        $wp_customize->add_setting('contact_number', array('default' => '(94) 11 111-1111'));
        $wp_customize->add_control('contact_number', array(
            'label' => __('Contact Number', 'visanduma_theme'),
            'section' => 'visanduma_footer_section',
            'settings' => 'contact_number',
            'type' => 'text',
                )
        );

        $wp_customize->add_setting('telegram_url', array('default' => '#telegram'));
        $wp_customize->add_control('telegram_url', array(
            'label' => __('Telegram URL', 'visanduma_theme'),
            'section' => 'visanduma_social_icons',
            'settings' => 'telegram_url',
            'type' => 'text'));

        $wp_customize->add_setting('facebook_url', array('default' => '#facebook'));
        $wp_customize->add_control('facebook_url', array(
            'label' => __('Facebook URL', 'visanduma_theme'),
            'section' => 'visanduma_social_icons',
            'settings' => 'facebook_url',
            'type' => 'text'));

        $wp_customize->add_setting('twitter_url', array('default' => '#twitter'));
        $wp_customize->add_control('twitter_url', array(
            'label' => __('Twitter URL', 'visanduma_theme'),
            'section' => 'visanduma_social_icons',
            'settings' => 'twitter_url',
            'type' => 'text'));
    }

}

add_action('customize_register', array('Visanduma_Customize', 'register'));
?>