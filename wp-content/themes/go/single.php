<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон вывода поста
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
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>
	<div class="sotset">	
		
	</div>
<h1 ><?php the_title();// Заголовок ?></h1>
<hr>
 <?php the_content(); // Содержимое страницы ?>
 <!-- Хлебный крошки -->
 <br/>
<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
<br/>
<?php endwhile; // Конец цикла ?>
<hr>
<div id="interesting_articles">
<div class="inteimg">
	<h3>Интересное на эко ферме</h3>
</div>
 <?php
$categories = get_the_category($post->ID);
if ($categories) {
 $category_ids = array();
 foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
 $args=array(
 'category__in' => $category_ids,  //сортировка по тегам (меткам)
 'post__not_in' => array($post->ID),
 'showposts'=>4,  //количество выводимых ячеек
 'orderby'=>rand, // в случайном порядке
 'caller_get_posts'=>1); //исключаем одинаковые записи
 $my_query = new wp_query($args);
 if( $my_query->have_posts() ) {
 echo '<ul>';
 while ($my_query->have_posts()) {
 $my_query->the_post();
?>
<li>
<div id="cell">
	<a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>">
		<div class="imgpost">
		<?php the_post_thumbnail('thumbnail'); ?>
		</div>
	</a>
	<br>
	<span id="txtmin">
		<a onclick="return !window.open(this.href)" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?>
		</a>
	</span>
</div>
</li>
<?php
}
echo '</ul>';
}
wp_reset_query();
}
?>
</div>
<?php if (comments_open()) { ?>
<?php comments_template('/comments.php'); ?>
<?php } ?>
</div>
</div>
<!--Конец table-cell-->
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
    
</div>

<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>