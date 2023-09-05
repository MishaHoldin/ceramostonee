<?php
/*
Template Name: Главная
*/
  ?>

	<?php get_header();?>

    <section class="banner">
      <div class="banner__container container">
        <div class="banner__content">
          <?php
						$banner = get_field('banner');
							if($banner):
									$title = $banner['banner__title'];
									$subtitle= $banner['banner__subtitle'];
									$list= $banner['banner__list'];
									$btn= $banner['banner__btn'];
							?>
									<h1 class="banner__title">
                    <?php echo $title?></h1>
                    <p class="banner__text">
                      <?php echo $subtitle?>
                    </p>
                    <ul class="banner__list">
                        <?php echo $list?>
                    </ul>
                    <a href="<?php echo $btn?>">
                      <button class="banner__btn">посмотреть</button>
                    </a>
							<?php 
								endif;
					?>
        </div>
        <div class="banner__img">
          
           <?php
						$banner = get_field('banner');
							if($banner):
									$img = $banner['banner__img'];
							?>
              <img src="<?php echo $img?>" alt="">
							<?php 
								endif;
					?>
        </div>
      </div>
    </section>

    <section class="catalog">
      <div class="catalog__container container">
        <h2 class="catalog__title">Каталог</h2>
        <div class="catalog__content">
          <div class="catalog__content-top">
            <?php if( have_rows('catalog') ): ?>
						<?php while( have_rows('catalog') ): the_row(); 
							$img = get_sub_field('catalog__img');
							$text = get_sub_field('catalog__text');
							$link = get_sub_field('catalog__link');
							?>
								<div class="catalog__image-container">
                  <img src="<?php echo $img?>" alt="Image 1">
                  <a href="<?php echo $link?>"><?php echo $text?></a>
                </div>
						<?php endwhile; ?>
					<?php endif; ?>
          </div>
          <div class="catalog__content-bott">
            <?php if( have_rows('catalog__bott') ): ?>
						<?php while( have_rows('catalog__bott') ): the_row(); 
							$img = get_sub_field('catalog__bott-img');
							$text = get_sub_field('catalog__bott-text');
							$link = get_sub_field('catalog__bott-link');
              $hide = get_sub_field('catalog__bott-hide');
							?>
								 <?php if (!$hide): ?> <!-- Проверка значения чекбокса для скрытия элемента -->
                <div class="catalog__image-container">
                    <img src="<?php echo $img?>" alt="Image 1">
                    <a href="<?php echo $link?>"><?php echo $text?></a>
                </div>
            <?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="faq">
      <div class="faq__container container">
        <?php
						$title = get_field('faq__title');
							?>
                <h2 class="faq__title"><?php echo $title?></h2> 
							<?php 
					?> 
        <div class="faq__content">
          <?php if( have_rows('faq__text') ): ?>
						<?php while( have_rows('faq__text') ): the_row(); 
							$text = get_sub_field('faq__main-text');
							?>
								<p class="faq__text"><?php echo $text?></p>
						<?php endwhile; ?>
					<?php endif; ?>  
        </div>
      </div>
    </section>

    <section class="recomend">
        <div class="recomend__container container">
          <?php $title = get_field('recomend__title');?>
          <h2 class="recomend__title"><?php echo $title?></h2>       
          <div class="recomend__content">
            <?php
              // Встановлюємо контекст групи полів за допомогою the_field()
              if( have_rows('recomend__content') ):
                  while( have_rows('recomend__content') ): the_row();
                   $subtitleMain = get_sub_field('recomend__subtitle-main');
                    $hideRecomend = get_sub_field('hide_recomend');
                    if(!$hideRecomend):
                  echo '
                  <h3 class="recomend__subtitle-main">' . esc_html($subtitleMain) . '</h3>
                  <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                  ';
                  ;
                      // Перевіряємо, чи є повторення для повторювального поля
                      if( have_rows('recomend__item') ):
                          while( have_rows('recomend__item') ): the_row();
                              // Отримуємо значення внутрішнього поля для поточного повторення
                              $img = get_sub_field('recomend__img');
                              $subtitle = get_sub_field('recomend__subtitle');
                              $price = get_sub_field('recomend__price');
                              $sale = get_sub_field('recomend__saleprice');    
                              $description = get_sub_field('recomend__description');

                              
                              // Виводимо значення поля
                              echo ' 
                                      <div class="recomend__item swiper-slide">
                                        <img src="' . esc_html($img) . '" alt="">
                                        <h3 class="recomend__subtitle">' . esc_html($subtitle) . '</h3>
                                        <p class="recomend__price">' . esc_html($price) . '</p>
                                        <p class="recomend__saleprice">' . esc_html($sale) . '</p>
                                        <p class="recomend__description">' . esc_html($description) . '</p>
                                      </div>
                                    ';
                          endwhile;
                      endif;
                      echo '</div>
                            <div class="swiper-pagination"></div>
                            </div>
                      ';
                       endif;
                  endwhile;
                endif;
              ?>
              

          </div>
        </div>
    </section>


    <section class="info">
      <div class="info__container container">
        <?php $title = get_field('contacts__title');?> 
        <h2 class="info__title"><?php echo $title?></h2>
        <div class="info__main">
          <div class="info__wrapper">
            <div class="info__content">
              <?php if( have_rows('info__content') ): ?>
                <?php while( have_rows('info__content') ): the_row(); 
                  $text = get_sub_field('info__text');
                  $subtitle = get_sub_field('info__subtitle');
                  ?>
                <div class="info__item">
                  <h2 class="info__subtitle"><?php echo $subtitle?></h2>
                <p class="info__text"><?php echo $text?></p>
              </div>
                <?php endwhile; ?>
              <?php endif; ?>   
            </div>
            <div class="info__content">
              <?php if( have_rows('info__content-second') ): ?>
                <?php while( have_rows('info__content-second') ): the_row(); 
                  $text = get_sub_field('info__text');
                  $subtitle = get_sub_field('info__subtitle');
                  ?>
                <div class="info__item">
                  <h2 class="info__subtitle"><?php echo $subtitle?></h2>
                  <p class="info__text"><?php echo $text?></p>
              </div>
                <?php endwhile; ?>
              <?php endif; ?>   
            </div>
          </div>
          <div class="info__map">
            <?php $img = get_field('info__img');?> 
            <img src="<?php echo $img?>" alt="">
          </div>
        </div>
      </div>
    </section>

  <?php get_footer();?>