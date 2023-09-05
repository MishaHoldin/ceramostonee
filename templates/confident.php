<?php
/*
Template Name: Политика конфиденциальности
*/
  ?>

	<?php get_header();?>

     <section class="confident">
        <div class="confident__container container">
          <?php $title = get_field('confident__title');?> 
          <h1 class="confident__title"><?php echo $title?></h1>
          <div class="confident__content">
            <?php $subtext = get_field('confident__subtext');?> 
            <p class="confident__text"><?php echo $subtext?></p>
            <?php if( have_rows('confident__content') ): ?>
                  <?php while( have_rows('confident__content') ): the_row(); 
                    $subtitle = get_sub_field('confident__subtitle');
                    $text = get_sub_field('confident__text');
                    ?>
                      <div class="confident__item">
                        <h2 class="confident__subtitle"><?php echo $title?></h2>
                        <p class="confident__text"><?php echo $text?></p>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>   
          </div>
        </div>
     </section>

  <?php get_footer();?>