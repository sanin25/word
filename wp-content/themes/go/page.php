<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон обычной страницы
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
get_header(); // Подключаем хедер?>
 
<div class="table-cell">
<div class="menuleft clearfix retxt" >

	<?php
	$args = array( // Выводим верхнее меню
		'theme_location'=>'left',
		'container_class'=> '',
		'menu_class' 	=> 'divmenu',
		'menu_id' 			=> 's',
		'depth'=> '2',
		'fallback_cb' => '',
		'items_wrap'	=>	'<ul id="%1$s" class="%2$s">%3$s</ul>'
		);
	wp_nav_menu($args);
	?>
</div>
<div class="centeritem clearfix" >
		<?php if (have_posts()) : while (have_posts()) : the_post(); // Цикл записей ?>
		<h1 ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><!-- Заголовок поста + ссылка на него -->
		<hr>
		 
		<?php the_content(''); // Выводим анонс ?>
		<?php endwhile; // Конец цикла.
else: echo '<h2>Извините, ничего не найдено...</h2>'; endif; // Если записей нет - извиняемся ?>  
<?php if (comments_open()) { ?>
<?php comments_template(); ?>
<?php } ?>
</div> 
</div>
<div class="table-cell-1 ">
	<div class="cont">
		<?php get_template_part( 'inc/contact' ); ?>
	</div>
</div>
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>