<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон вывода поста
 * http://dontforget.pro
 * @package WordPress
 * @subpackage fermerjeck
 */
get_header(); // Подключаем хедер
?> 
		<div class="container cont1 ">
			     <img src="<?php echo get_template_directory_uri()?>/img/logo.png" alt="">
	    </div>
	    <div class="container cont2 ">
	    	<div class="foto animated  bounceInLeft wow">
			       <img src="<?php echo get_template_directory_uri()?>/img/foto/kh.jpg" alt="">
			 </div>  
			 <section class="wow slideInLeft">fefe</section>     

	    </div>
	        <div class="container cont3 ">
	    		       <div class="menutop menuright clearfix"  id="fittext3">
	    		   			<?php  get_my_menu_left();?>
	    		       </div>
	        </div>

			<?php get_sidebar(); // Подключаем сайдбар ?>
			