<?php

function custom_breadcrumbs() {
    // Получаем текущую страницу
    $current_page = get_queried_object();

    // Создаем массив для хранения крошек
    $breadcrumbs = array();

    // Добавляем домашнюю страницу в крошки
    $breadcrumbs[] = '<a href="' . home_url() . '">' . __('home', 'text_domain') . '</a>';

    // Проверяем, является ли текущая страница дочерней
    if (is_page() && $current_page->post_parent) {
        // Получаем родительские страницы
        $parent_ids = array_reverse(get_post_ancestors($current_page->ID));

        // Перебираем родительские страницы
        foreach ($parent_ids as $parent_id) {
            $breadcrumbs[] = '<a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a>';
        }
    }

    // Добавляем текущую страницу в крошки
    if (is_page() || is_single()) {
        $breadcrumbs[] = '<span>' . get_the_title() . '</span>';
    } elseif (is_category()) {
        $breadcrumbs[] = '<span>' . single_cat_title('', false) . '</span>';
    } elseif (is_tag()) {
        $breadcrumbs[] = '<span>' . single_tag_title('', false) . '</span>';
    } elseif (is_author()) {
        $breadcrumbs[] = '<span>' . get_the_author() . '</span>';
    } elseif (is_archive()) {
        $breadcrumbs[] = '<span>' . __('Archives', 'text_domain') . '</span>';
    } elseif (is_search()) {
        $breadcrumbs[] = '<span>' . __('Search results', 'text_domain') . '</span>';
    } elseif (is_404()) {
        $breadcrumbs[] = '<span>' . __('404 Not Found', 'text_domain') . '</span>';
    }

    // Выводим крошки
    if (!empty($breadcrumbs)) {
        echo '<div class="breadcrumbs">' . implode(' &gt; ', $breadcrumbs) . '</div>';
    }
}

add_theme_support( 'post-thumbnails' );

//-----------Custom- pagination ----------------//
function wptuts_pagination( $args = array() ) {
    $defaults = array(
            'range'           => 4,
            'custom_query'    => FALSE,
            'before_output'   => '<nav class="navigation pagination">',
            'after_output'    => '</nav>'
    );

    $args = wp_parse_args(
            $args,
            apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );

    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
            $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );

    if ( $count <= 1 )
            return FALSE;

    if ( !$page )
            $page = 1;

    if ( $count > $args['range'] ) {
            if ( $page <= $args['range'] ) {
                    $min = 1;
                    $max = $args['range'] + 1;
            } elseif ( $page >= ($count - $ceil) ) {
                    $min = $count - $args['range'];
                    $max = $count;
            } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
                    $min = $page - $ceil;
                    $max = $page + $ceil;
            }
    } else {
            $min = 1;
            $max = $count;
    }

    $echo = '';

    if ( !empty($min) && !empty($max) ) {
            for( $i = $min; $i <= $max; $i++ ) {
                    if ($page == $i) {
                            $echo .= '<span class="active">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</span>';
                    } else {
                            $echo .= sprintf( '<a href="%s">%2d</a>', esc_attr( get_pagenum_link($i) ), $i );
                    }
            }
    }

    if ( isset($echo) )
            echo $args['before_output'] . $echo . $args['after_output'];
}

// Добавляем действие, чтобы обрабатывать поиск при отправке формы поиска
add_action('init', 'custom_search_filter');

function custom_search_filter() {
    if (isset($_GET['custom_search']) && $_GET['custom_search'] === 'true') {
        // Проверяем, что поисковый запрос был отправлен
        $search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';
        
        // Если поисковый запрос пуст, не выполняем никаких действий
        if (empty($search_query)) {
            return;
        }
        
        // Создаем параметры для поиска товаров
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            's' => $search_query,
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
        );

        // Получаем результаты поиска
        $products = new WP_Query($args);

        // Выводим результаты
        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                // Выводим название товара и другую информацию о товаре
                the_title('<h2>', '</h2>');
                // Дополнительная информация о товаре
                // ...
            }
        } else {
            // Если результаты поиска не найдены
            echo 'Ничего не найдено.';
        }

        wp_reset_postdata();
        exit; // Завершаем выполнение после вывода результатов
    }
}


