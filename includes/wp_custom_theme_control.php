<?php

/* --------------------------------------------------------------
CUSTOM SETTINGS FOR CUSTOMIZE AREA
-------------------------------------------------------------- */

function usaveganmag_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'footer_section' , array(
        'title'      => __('Footer', 'usaveganmag'),
        'description' => __('General options for Footer Section', 'usaveganmag'),
        'priority'   => 35,
    ) );

    $wp_customize->add_setting( 'footer_color' , array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting('footer_background', array(
        'transport' => 'refresh',
        'height' => 325,
    ));

    $wp_customize->add_setting('footer_logo', array(
        'transport' => 'refresh',
        'height' => 70,
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
        'label'    => __( 'Footer Color', 'starter' ),
        'description' => __( 'This color will be posted as background on footer section.', 'usaveganmag' ),
        'section'  => 'footer_section',
        'settings' => 'footer_color',
    ) ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_background_img',
            array(
                'label'      => __( 'Upload an Image', 'usaveganmag' ),
                'description' => __( 'This image will be posted as background on footer section.', 'usaveganmag' ),
                'section'    => 'footer_section',
                'settings'   => 'footer_background'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo_image',
            array(
                'label'      => __( 'Upload a Logo', 'usaveganmag' ),
                'description' => __( 'This logo will be posted on footer section.', 'usaveganmag' ),
                'section'    => 'footer_section',
                'settings'   => 'footer_logo'
            )
        )
    );
}
add_action( 'customize_register', 'usaveganmag_customize_register' );

/* --------------------------------------------------------------
CUSTOM AREA FOR OPTIONS DATA - usaveganmag
-------------------------------------------------------------- */
