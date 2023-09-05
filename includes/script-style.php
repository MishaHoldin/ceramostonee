<?php

//------------------додавання css + js ----------------------
function ewa_scripts() {
	//---------------css---------------------
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/app.min.css' );

	//---------------js---------------------
	wp_enqueue_script( 'main-sctipt', get_template_directory_uri() . '/assets/js/app.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ewa_scripts' );

//-menu----
    register_nav_menus(array(
        'menu' => 'Навигация по сайту'
    ));
    
		register_nav_menus(array(
        'footer' => 'Навигация по сайту'
    ));

		
