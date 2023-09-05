<?php
/*
Template Name: Каталог
*/
  ?>

	<?php get_header();?>

  <section class="shop">
    <div class="shop__container container">
        <div class="categories">
            <h3>Категории</h3>
            <ul>
                <?php
                $categories = get_categories(); // Отримуємо список категорій

                foreach ($categories as $category) {
                    // Перевіряємо, чи має категорія дочірні категорії
                    $has_children = count(get_ancestors($category->term_id, 'category')) > 0;

                    // Якщо категорія має дочірні категорії, пропускаємо її вивід в загальному списку
                    if ($has_children) {
                        continue;
                    }

                    $category_class = ($current_category->slug === $category->slug) ? 'blog__current_category' : '';

                    echo '<li class="category">';
                    echo '<p>' . $category->name . '</p>'; // Виводимо назву категорії

                    $args = array(
                        'child_of' => $category->term_id, // Використовуємо ID категорії для отримання дочірніх підкатегорій
                        'hide_empty' => 0, // Показуємо порожні категорії
                        'taxonomy' => 'category' // Таксономія (може бути 'category', 'post_tag', або будь-яка інша використовувана в вашому випадку)
                    );

                    $child_categories = get_categories($args);

                    if ($child_categories) {
                        echo '<ul class="subcategories">';

                        foreach ($child_categories as $child_category) {
                            echo '<a href="' . get_category_link($child_category->term_id) . '">';
                            echo '<li>' . $child_category->name . '</li>'; // Виводимо назву дочірньої підкатегорії
                            echo '</a>';
                        }

                        echo '</ul>';
                    } else {
                        echo '<ul class="subcategories">';
                        echo '</ul>';
                    }

                    echo '</li>';
                }
                ?>
            </ul>
        </div>
       <div class="shop__products">
            <div class="categories">
                <h3 class="shop__title">Категории</h3>
            </div>
            <div class="shop__content">
                <?php
                $current_category = get_queried_object();
                $args = array(
					'post_type'      => 'post',
					'posts_per_page' => 1, // Кількість постів на сторінці
					'paged'          => get_query_var( 'paged' ), // Поточна сторінка
					'orderby'        => 'title', // Сортувати за датою
					'order'          => 'ASC' 
                );

                $posts = get_posts($args);
                foreach ($posts as $post) {
                    setup_postdata($post);
                    ?>
                    <div class="shop__item">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            <h3 class="shop__subtitle"><?php the_title(); ?></h3>
                            <?php if (have_rows('shop__item')) : ?>
                                <?php while (have_rows('shop__item')) : the_row();
                                    $price = get_sub_field('shop__price');
                                    $sale = get_sub_field('saleprice');
                                    $description = get_sub_field('shop__description');
                                    ?>
                                    <p class="shop__price"><?php echo $price ?></p>
                                    <p class="recomend__saleprice"><?php echo $sale ?></p>
                                    <p class="shop__description"><?php echo $description ?></p>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php
                       echo '</div>';
                    wptuts_pagination( array( 'custom_query' => $custom_query ) ); // Передаємо власну змінну запиту в пагінацію
                    wp_reset_postdata(); // Скидаємо дані запиту
                echo '</div>';
                }
                
                ?>
            </div>
            <?php
             
            ?>
        </div>
    </div>
    
</section>

<style>
    .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
    }

    .pagination a,
    .pagination span {
    display: inline-block;
    padding: 8px 12px;
    margin: 0 4px;
    text-decoration: none;
    color: #cfcfcf;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    }

    .pagination a:hover {
    background-color: #f2f2f2;
    }

    .pagination .current {
    background-color: #666;
    color: #fff;
    border-color: #666;
    }

</style>


  <?php get_footer();?>

