<?php get_header(); ?>

    <section class="blog">
      <div class="blog__container container">
        <div class="blog__content">
          <div class="blog__banner">
            <div class="blog__img">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
            <div class="blog__price">
              <div class="blog__stocks">
                <?php
                      $sale = get_field('blog__credit');

                    // Проверяем, не является ли переменная $sale пустой или равной null
                    if (!empty($sale)) {
                        // Если $sale не пусто, то выводим содержимое в div-контейнер
                        echo '<div class="blog__credit">' . $sale . '</div>';
                    } else {
                        // Если $sale пусто, то выводим div-контейнер с стилем display: none
                        echo '<div class="blog__credit" style="display: none;"></div>';
                      }
                      ?>
                      <?php
                      $discount = get_field('blog__discount');

                    // Проверяем, не является ли переменная $discount пустой или равной null
                    if (!empty($discount)) {
                        // Если $discount не пусто, то выводим содержимое в div-контейнер
                        echo '<div class="blog__discount">' . $discount . '</div>';
                    } else {
                        // Если $discount пусто, то выводим div-контейнер с стилем display: none
                        echo '<div class="blog__discount" style="display: none;"></div>';
                      }
                      ?>
              </div>
              <div class="blog__oldprice">
                <?php
                    $oldprice = get_field('blog__oldprice');

                  // Проверяем, не является ли переменная $discount пустой или равной null
                  if (!empty($oldprice )) {
                      // Если $oldprice  не пусто, то выводим содержимое в div-контейнер
                      echo '<div class="blog__oldprice">' . $oldprice  . '</div>';
                  } else {
                      // Если $oldprice  пусто, то выводим div-контейнер с стилем display: none
                      echo '<div class="blog__oldprice" style="display: none;"></div>';
                    }
                    ?>
                  </div>

                  <div class="blog__newprice">
                    <?php
                      $newprice = get_field('blog__newprice');

                    // Проверяем, не является ли переменная $discount пустой или равной null
                    if (!empty($newprice )) {
                        // Если $newprice  не пусто, то выводим содержимое в div-контейнер
                        echo '<div class="blog__newprice">' . $newprice  . '</div>';
                    } else {
                        // Если $newprice  пусто, то выводим div-контейнер с стилем display: none
                        echo '<div class="blog__newprice" style="display: none;"></div>';
                      }
                      ?>
              </div>
            </div>
          </div>
          <div class="blog__info">
            <div class="blog__article">
              <?php
                    $article = get_field('blog__article');
                    ?>
                <h3><?php echo $article?></h3>
                    <?php
                  // Получаем значение чекбокса из ACF
                  $checkbox_value = get_field('checkbox_yes');

                  if ($checkbox_value) {
                      // Если чекбокс отмечен, выводим <p> с классом "class1"
                      echo '<p class="blog__yes">ЕСТЬ В НАЛИЧИИ</p>';
                  } else {
                      // Если чекбокс не отмечен, выводим <p> с классом "class2"
                      echo '<p class="blog__no">НЕТ В НАЛИЧИИ</p>';
                  }
                  ?>
            </div>
              <h2 class="blog__title"><?php the_title(); ?></h2>
            <div class="blog__midle">
             
                 <?php if (have_rows('blog__midle')) : ?>
                                <?php while (have_rows('blog__midle')) : the_row();
                                    $name = get_sub_field('blog__name');
                                    $value = get_sub_field('blog__value');
                                    ?>
                                     <div class="blog__item">
                                      <p class="blog__name"><?php echo $name?></p>
                                      <p class="blog__value"><?php echo $value?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
            </div>
            <div class="blog__footer">
                <div class="blog__column">
                  <h2 class="blog__subtitle">Город</h2>
                  <ul class="blog__list">
                           <?php if (have_rows('blog__city')) : ?>
                                <?php while (have_rows('blog__city')) : the_row();
                                    $city = get_sub_field('city');
                                    ?>
                                    
                                      <li><?php echo $city;?></li>
                                    
                                <?php endwhile; ?>
                            <?php endif; ?>
                            </ul>
                </div>
                <div class="blog__column">
                  <h2 class="blog__subtitle">На складе</h2>
                  <ul class="blog__list">
                    <?php if (have_rows('blog__sklad')) : ?>
                                <?php while (have_rows('blog__sklad')) : the_row();
                                    $sklad = get_sub_field('sklad');
                                    ?>
                                      <li><?php echo $sklad;?></li>       
                                <?php endwhile; ?>
                            <?php endif; ?>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="blog__char">
          <h2 class="blog__title">Характеристики</h2>
          <div class="blog__char-table">
               <?php if (have_rows('main__char')) : ?>
                                <?php while (have_rows('main__char')) : the_row();
                                    $char__name = get_sub_field('char__name');
                                    $char__value = get_sub_field('char__value');
                                    ?>
                                      <div class="blog__column-item">
                                        <span class="blog__column-label"><?php echo  $char__name;?></span>
                                        <span><?php echo  $char__value;?></span>
                                      </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
          </div>
          <div class="blog__description">
          <h2 class="blog__description-wrong">Обратите внимание:</h2>
          <p class="blog__text">Характеристики и комплектация могут быть изменены производителем. Цвет изделия может отличаться из-за настроек монитора</p>
        </div>
        </div>
      </div>
    </section>

<style>
  .blog__yes{
    font-weight: 700;
    font-size: 12px;
    line-height: 12px;
    text-transform: uppercase;
    color: #15812d;
  }
  .blog__no{
    font-weight: 700;
    font-size: 12px;
    line-height: 12px;
    text-transform: uppercase;
    color: #e40134 !important;
  }
</style>

<?php get_footer(); ?>      