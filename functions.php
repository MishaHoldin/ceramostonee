<?php

//-----------script-style---------------
require get_template_directory() . '/includes/script-style.php';

// -------------------- ACF --------------------
require get_template_directory() . '/includes/acf.php';

//----------functions-base-------------
require get_template_directory() . '/includes/functions-base.php';

// Регистрируем кастомную категорию
function custom_taxonomy() {
    $labels = array(
        'name'              => 'Фильтр', // Название категории во множественном числе
        'singular_name'     => 'Фильтр', // Название категории в единственном числе
        'search_items'      => 'Искать Фильтр',
        'all_items'         => 'Все Фильтр',
        'parent_item'       => 'Родительская Фильтр',
        'parent_item_colon' => 'Родительская Фильтр:',
        'edit_item'         => 'Редактировать Фильтр',
        'update_item'       => 'Обновить Фильтр',
        'add_new_item'      => 'Добавить новую Фильтр',
        'new_item_name'     => 'Название новой Фильтр',
        'menu_name'         => 'Фильтр', // Название категории в меню административной панели
    );

    $args = array(
        'hierarchical'      => true, // Если true, то категория будет иметь родительскую категорию
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'filter' ), // Замените 'my-category' на желаемый URL-адрес
    );

    register_taxonomy( 'filter', 'post', $args ); // Замените 'my_category' на желаемый слаг таксономии
}
add_action( 'init', 'custom_taxonomy' );
