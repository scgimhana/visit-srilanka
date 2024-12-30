<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_additional-title-field-for-pages',
        'title' => 'Additional Title Field For Pages',
        'fields' => array(
            array(
                'key' => 'field_54a3850c9426e',
                'label' => 'Additional Title',
                'name' => 'additional_title',
                'type' => 'text',
                'instructions' => 'This is an additional title for a page (optional)',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 1,
    ));
}
?>