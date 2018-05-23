<?php
/**
 * Nipissing U functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 */

/* load the parent and child stylesheets */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
    );
}


// deregister the header images of Twenty Eleven, and register a few new RAW header images//
add_action( 'after_setup_theme', 'raw_theme_header_images', 11 ); 

function raw_theme_header_images() {
    unregister_default_headers( array( 'wheel', 'shore', 'trolley', 'pine-cone', 'chessboard', 'lanterns', 'willow', 'hanoi' ) ); 
    $folder = get_stylesheet_directory_uri();
    register_default_headers( array(
        'mast1' => array(
            'url' => $folder.'/images/headers/mast1.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast1-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast1', 'twentyeleven' )
        ),
        'mast2' => array(
            'url' => $folder.'/images/headers/mast2.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast2-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast2', 'twentyeleven' )
        ),
        'mast3' => array(
            'url' => $folder.'/images/headers/mast3.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast3-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast3', 'twentyeleven' )
        ),
        'mast4' => array(
            'url' => $folder.'/images/headers/mast4.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast4-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast4', 'twentyeleven' )
        ),
        'mast5' => array(
            'url' => $folder.'/images/headers/mast5.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast5-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast5', 'twentyeleven' )
        ),
        'mast6' => array(
            'url' => $folder.'/images/headers/mast6.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast6-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast6', 'twentyeleven' )
        ),
        'mast7' => array(
            'url' => $folder.'/images/headers/mast7.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast7-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast7', 'twentyeleven' )
        ),
        'mast8' => array(
            'url' => $folder.'/images/headers/mast8.jpg',
            'thumbnail_url' => $folder.'/images/headers/mast8-thumb.jpg',
            /* translators: header image description */
            'description' => __( 'mast8', 'twentyeleven' )
        )
    )
    );
}

register_sidebar( array(
		'name' => __( 'Content widget area', 'twentyeleven' ),
		'id' => 'content-widget',
		'description' => __( 'An optional widget area for your content area', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


// removes the word Protected from the title of password protected pages
add_filter('protected_title_format', 'vvblankptitle');
function vvblankptitle($title) {
       return '%s';
}
