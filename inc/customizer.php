<?php
/**
 * jppre Theme Customizer
 *
 * @package jppre
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jppre_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->add_setting(
        'post_title_color',
        array(
			'type' => 'theme_mod',
            'default'     => '#000000'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'post_title_color',
            array(
                'label'      => __( 'Link Color', '_s' ),
                'section'    => 'colors',
                'settings'   => 'post_title_color'
            )
        )
    );
	
}
add_action( 'customize_register', 'jppre_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jppre_customize_preview_js() {
	wp_enqueue_script( 'jppre_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'jppre_customize_preview_js' );