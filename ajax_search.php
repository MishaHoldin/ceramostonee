<?php
if (isset($_GET['custom_search']) && $_GET['custom_search'] === 'true') {
    // Проверяем, что поисковый запрос был отправлен
    $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    // Если поисковый запрос пуст, не выполняем никаких действий
    if (!empty($search_query)) {
        // Создаем параметры для поиска записей (постов)
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            's' => $search_query,
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
        );

        // Получаем результаты поиска
        $posts = new WP_Query($args);

        // Формируем массив с результатами постов
        $results = array();
        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();
                $post_data = array(
                    'permalink' => get_permalink(),
                    'title' => get_the_title(),
                    'thumbnail' => has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : get_template_directory_uri() . '/images/default-thumbnail.jpg',
                    'excerpt' => get_the_excerpt(),
                );
                $results[] = $post_data;
            }
        }

        // Отправляем результаты в JSON-формате
        header('Content-Type: application/json');
        echo json_encode($results);

        wp_reset_postdata();
    }
    exit;
}
?>
