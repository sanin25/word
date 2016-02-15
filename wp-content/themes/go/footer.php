<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон футера
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */

	wp_footer(); // Необходимо для нормальной работы плагинов
?>


  
 <div class=" myfooter">
 <?php $header_image = get_theme_mod('header_image',get_stylesheet_directory_uri().'/img/footer.png');
 		echo '<img src="'.esc_url( $header_image ).'"  >';
 ?>
 </div>
 
</body>
</html>