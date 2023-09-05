	<?php
  // Получаем URL вашего сайта
  $home_url = get_home_url();
?>
	
	<header class="header">
      <div class="header__container container">
        <div class="header__logo">
            <a href="<?php echo $home_url?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page4.png" alt="">
          </a>
        </div>
          
          <ul class="header__list">
            <?php 
							wp_nav_menu( array(
								'menu'=>'menu',
								'menu_class'=>'header__nav',
									'theme_location'=>'menu',
								) );
							?>
          </ul>
                 
        <button class="hamburger" type="button">
          <span class="hamburger__item"></span>
        </button>
       <?php
          echo do_shortcode( '[wpdreams_ajaxsearchlite]' );
        ?>
        <style>
          div.asl_m{
            z-index: 1;
          }
        </style>
  </header>