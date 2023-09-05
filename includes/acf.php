<?php

//------------------настройка- ACF---------------------


    if( function_exists('acf_add_options_page') ) {
     
        $option_page = acf_add_options_page(array(
            'page_title'    => 'Базовые блоки',
            'menu_title'    => 'Базовые блоки',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'  => false
        ));
     
    }