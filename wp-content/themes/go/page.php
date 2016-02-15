<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон обычной страницы
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
get_header(); // Подключаем хедер?>
 
<div class="centeritem" >
		<?php if (have_posts()) : while (have_posts()) : the_post(); // Цикл записей ?>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><!-- Заголовок поста + ссылка на него -->
		<hr>
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } // Проверяем наличие миниатюры, если есть показываем ?>
		<?php the_content(''); // Выводим анонс ?>
		<?php endwhile; // Конец цикла.
else: echo '<h2>Извините, ничего не найдено...</h2>'; endif; // Если записей нет - извиняемся ?>  
<?php if (comments_open()) { ?>
<?php comments_template(); ?>
<?php } ?>
</div>
</div>
</div>  
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>