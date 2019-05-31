<?php
/*
Plugin Name: Custom Page Loader
Plugin URI: https://github.com/WestCoastDigital/wcd-pageloader
Description: Add a page loader to your website
Version: 0.1.0
Author: West Coast Digital
Author URI: https://westcoastdigital.com.au
Text Domain: wcd
Domain Path: /languages
*/


/**
 * Page loader function
 */
class wcdPageLoader
{

    public function page_loader()
    {

        $content_select = get_theme_mod('wcd_pageloader_content');
        $custom_image = get_theme_mod('wcd_pageloader_custom_image');
        $custom_text = get_theme_mod('wcd_pageloader_custom_text');
        $animate = get_theme_mod('wcd_pageloader_animation');
        $logo_id = get_theme_mod('custom_logo');
        $site_name = get_bloginfo('name');
        if( !$animate ) {
            $class = 'pageloader animate';
        } else {
            $class = 'pageloader';
        }

        $pageloader = '<div id="wcd-pageloader" class="' . $class . '">';
        $pageloader .= '<div class="pageloader-container">';
        if ($content_select == 'logo' && !empty($logo_id) ) {
            $logo = wp_get_attachment_image_src($logo_id, 'full');
            $pageloader .= '<img src="' . $logo[0] . '" alt="' . $site_name . '" />';
        } elseif( $content_select == 'site_title' ) {
            $pageloader .= '<h3>' . $site_name . '</h3>';
        } elseif( $content_select == 'text' && !empty($custom_text)) {
            $pageloader .= '<h3>' . $custom_text . '</h3>';
        } elseif( $content_select == 'image' && !empty($custom_image)) {
            $pageloader .= '<img src="' . $custom_image . '" alt="' . $site_name . '" />';
        }
        $pageloader .= '</div>';
        $pageloader .= '</div>';

        echo $pageloader;
    } // page_loader()

    public function customizer_settings($wp_customize)
    {

        $wp_customize->add_section('wcd_pageloader', array(
            'title'      => __('Page Loader', 'wcd'),
            'priority'   => 30,
        ));

        $wp_customize->add_setting('wcd_pageloader_content', array(
            'default' => 'site_title',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control('wcd_pageloader_content', array(
            'type' => 'select',
            'section' => 'wcd_pageloader',
            'label' => __('Select Content', 'wcd'),
            'description' => __('Choose logo, site title, custom image or custom text', 'wcd'),
            'choices' => array(
                'logo' => __('Logo', 'wcd'),
                'site_title' => __('Site Title', 'wcd'),
                'image' => __('Custom Image', 'wcd'),
                'text' => __('Custom Text', 'wcd'),
            ),
        ));

        $wp_customize->add_setting(
            'wcd_pageloader_custom_image',
            array(
                'default' => '',
            )
        );

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'wcd_pageloader_custom_image',
            array(
                'label' => __('Custom Image', 'wcd'),
                'description' => __('Upload custom image', 'wcd'),
                'section' => 'wcd_pageloader',
                'button_labels' => array(
                    'select' => __('Select Image'),
                    'change' => __('Change Image'),
                    'remove' => __('Remove'),
                    'default' => __('Default'),
                    'placeholder' => __('No image selected'),
                    'frame_title' => __('Select Image'),
                    'frame_button' => __('Choose Image'),
                )
            )
        ));

        $wp_customize->add_setting(
            'wcd_pageloader_custom_text',
            array(
                'default' => __('Loading', 'wcd') . '...',
            )
        );

        $wp_customize->add_control(
            'wcd_pageloader_custom_text',
            array(
                'label' => __('Custom Text', 'wcd'),
                'description' => __('Add custom loader text', 'wcd'),
                'section' => 'wcd_pageloader',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting(
            'wcd_pageloader_font_size',
            array(
                'default' => '',
            )
        );

        $wp_customize->add_control(
            'wcd_pageloader_font_size',
            array(
                'label' => __('Custom Font Size', 'wcd'),
                'description' => __('Leave blank for themes default H3 font size.<br>Output is in <span style="color:#000;font-weight:700;">px</span>', 'wcd'),
                'section' => 'wcd_pageloader',
                'type' => 'number',
                'input_attrs' => array(
                    'style' => 'width: 25%;',
                    'min' => '1',
                    'max' => '500',
                ),
            )
        );

        $wp_customize->add_setting('wcd_pageloader_font', array(
            'default' => '#ffffff',
        ));

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'wcd_pageloader_font',
                array(
                    'label' => __('Font Colour', 'wcd'),
                    'description' => __('Select a color for the page loader content', 'wcd'),
                    'section' => 'wcd_pageloader',
                )
            )
        );

        $wp_customize->add_setting('wcd_pageloader_bg', array(
            'default' => '#ffffff',
        ));

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'wcd_pageloader_bg',
                array(
                    'label' => __('Background Colour', 'wcd'),
                    'description' => __('Select a color for the page loader background', 'wcd'),
                    'section' => 'wcd_pageloader',
                )
            )
        );

        $wp_customize->add_setting( 'wcd_pageloader_animation',
            array(
                'default' => 0,
                'transport' => 'refresh',
            )
        );
        
        $wp_customize->add_control( 'wcd_pageloader_animation',
            array(
                'label' => __( 'Disable Flashing Animation', 'wcd' ),
                'description' => __( 'By default animation is set to flash, you can disable it here' ),
                'section'  => 'wcd_pageloader',
                'type'=> 'checkbox',
            )
        );
    } // customizer_settings

    public function customiser_enqueue()
    {
        wp_enqueue_script('jquery');
        // wp_enqueue_script('wcd-pageloader-customiser', plugins_url('/customiser.js', __FILE__));
    }

    public function enqueue_scripts()
    {
        /**
         * Enqueue CSS
         */
        wp_enqueue_style('wcd-pageloader', plugins_url('/pageloader.css', __FILE__));

        /**
         * Enqueue JS
         */
        wp_enqueue_script('jquery');
        wp_enqueue_script('wcd-pageloader', plugins_url('/pageloader.js', __FILE__));
    }

    public function customiser_style()
    {

        $background = get_theme_mod('wcd_pageloader_bg') ? get_theme_mod('wcd_pageloader_bg') : '#fff';
        $text = get_theme_mod('wcd_pageloader_font') ? get_theme_mod('wcd_pageloader_font') : '#333';
        $font_size = get_theme_mod('wcd_pageloader_font_size') ? get_theme_mod('wcd_pageloader_font_size') : '';
        $style = '<style>';

        $style .= '
            #wcd-pageloader {
                background-color: ' . $background . ';
            }
            #wcd-pageloader h3 {
                color: ' . $text . ';
                font-size: ' . $font_size . 'px;
            ';

        $style .= '</style>';

        echo $style;
    }
} // wcdPageLoader

/**
 * Check if wp_body_open action function exists
 * This function is required since WordPress 5.2
 */
if (class_exists('wcdPageLoader') && function_exists('wp_body_open')) {

    add_action('customize_register', 'wcdPageLoader::customizer_settings');
    add_action('wp_body_open', 'wcdPageLoader::page_loader');
    add_action('wp_enqueue_scripts', 'wcdPageLoader::enqueue_scripts');
    add_action('wp_head', 'wcdPageLoader::customiser_style');
    add_action('customize_controls_enqueue_scripts', 'wcdPageLoader::customiser_enqueue');
}
