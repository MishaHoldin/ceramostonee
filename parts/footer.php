	<?php
  // Получаем URL вашего сайта
  $home_url = get_home_url();
?>

	<footer class="footer">
		<div class="footer__container container">
			<div class="header__logo">
            <a href="<?php echo $home_url?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page4.png" alt="">
          </a>
        </div>
			<ul class="footer__list">
				<?php 
							wp_nav_menu( array(
								'menu'=>'footer',
								'menu_class'=>'footer__list',
								'theme_location'=>'menu',
								'menu_id'=>'',
								) );
							?>
			</ul>
		</div>
		<div class="fixed-meida">
			<a href="https://api.whatsapp.com/send/?phone=77014098112&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5!%20%D0%9F%D0%B8%D1%88%D1%83%20%D0%B8%D0%B7%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0&type=phone_number&app_absent=0">
				<div class="fixed-meida__social">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp.svg" alt="Whatsap">
				</div>
			</a>
		</div>
	</footer>
</body>
</html>
