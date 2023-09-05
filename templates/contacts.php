<?php
/*
Template Name: Контакты
*/
  ?>

	<?php get_header();?>

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