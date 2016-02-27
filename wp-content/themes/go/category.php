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
    <div class="menuleft clearfix retxt" >

        <?php
        $args = array(// Выводим верхнее меню
            'theme_location' => 'left',
            'container_class' => '',
            'menu_class' => 'divmenu',
            'menu_id' => 's',
            'depth' => '2',
            'fallback_cb' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        );
        wp_nav_menu($args);
        ?>
    </div>
<div class="centeritem clearfix" >
<div class="gatpost">
	<div class="katalog">
<h1>Раздел <?php wp_title(''); // Заголовок категории ?></h1>
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
								<br/>
								<i class="fa fa-hand-o-right"></i> 
								<span class="more">Читать полностью »</span>
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
<div class="table-cell-1">
    <div class="searchimg ">

        <?php
        get_search_form();
        ?>

    </div>
    <div class="menutop menuright clearfix"  id="fittext3">

        <?php
        $args = array(// Выводим верхнее меню
            'theme_location' => 'right',
            'container_class' => '',
            'menu_class' => 'divmenu',
            'menu_id' => 'topmenu',
            'depth' => '2',
            'fallback_cb' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        );
        wp_nav_menu($args);
        ?>
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