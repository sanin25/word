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
	<?php get_my_menu_left(); ?>
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
<div class="table-cell-1">
    <div class="searchimg ">
		<?php get_search_form(); ?>
	</div>
    <div class="menutop menuright clearfix"  id="fittext3">
			<?php  get_my_menu_right();?>
    </div>
    <div class="cont ">
        <?php get_template_part('inc/contact'); ?>
    </div>
    <div class="newpost">
    <p>Последнее на сайте</p>
    	 <ul>
    	<?php $the_query = new WP_Query( 'showposts=3' ); ?>
		<li>
    	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
    		<h2><?php the_title(); ?></h2>
    	<?php
    	  announcement('segment_lengthtow','segment_more'); 
    	?>
    	</li>
    	<?php endwhile;?>
    	</ul>
    </div>
</div>

<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>