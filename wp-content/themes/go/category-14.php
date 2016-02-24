<!--Выводим шапку-->
<?php get_header(); ?>
<div class="table-cell">
<div class="menutop menuright clearfix"  id="fittext3">

	<?php
	$args = array( // Выводим верхнее меню
		'theme_location'=>'right',
		'container_class'=> '',
		'menu_class' 	=> 'divmenu',
		'menu_id' 			=> 'topmenu',
		'depth'=> '2',
		'fallback_cb' => '',
		'items_wrap'	=>	'<ul id="%1$s" class="%2$s">%3$s</ul>'
		);
	wp_nav_menu($args);
	?>
</div>
<div class="centeritem clearfix" >
<!--Индивидуальные стили-->
<div class="span-24" id="contentwrap">
<div class="span-16">
<div id="content">
<!--Заголовок рубрики-->
<h2><?php single_cat_title(); ?></h2>
<!--Код вывода заголовков постов из категории с миниатюрами-->
<div class="katalog">
<ul><?php query_posts('category__in=14&showposts=100'); ?>
<?php while (have_posts()) : the_post(); ?>
<li>
<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(80,70)); ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><br/>
</li>
<?php endwhile; ?>
</ul>
</div>
<!--Конец кода вывода постов из категории-->
</div>
</div>
<!--Тег вывода сайдбара-->
</div>
</div>
</div>

<!--Конец индивидуальных стилей-->
<!--Тег вывода подвала-->
<?php get_footer(); ?>