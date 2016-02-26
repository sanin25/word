<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон вывода постов в категории(рубрике)
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */

get_header(); // Подключаем хедер ?>
<div class="table-cell">
<div class="centeritem clearfix" >
<div id="category">
<h1><?php wp_title(''); // Заголовок категории ?></h1>
<div class="gatpost">
	<div class="katalog">
					<ul>
						<?php if (have_posts()) : while (have_posts()) : the_post(); // Цикл записей ?>
							<li>
							<h2><?php the_title(); ?> </h2>
							<br/>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(80,70));?></a>
								<?php
									announcement('segment_length','segment_more'); 
								?>
								<a href="<?php the_permalink(); ?>">
								<span class="more">
									Читать полностью »
								</span>
							</a>
							<br/>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
<?php else: echo '<h2>Извините, ничего не найдено...</h2>'; endif; // Если записей нет - извиняемся ?>	 
<?php // Пагинация
global $wp_query;
$big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'type' => 'list',
	'prev_text'    => __('« Сюда'), 
    'next_text'    => __('Туда »'),
	'total' => $wp_query->max_num_pages
) );
?>
</div>
</div>
</div>
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>