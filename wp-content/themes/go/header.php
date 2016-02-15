<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон хэдера
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<!-- RSS, стиль и всякая фигня -->
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	


 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
 <title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " | "
global $page, $paged;
wp_title( '|', true, 'right' );
bloginfo( 'name' );
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp
	?>
</head>
<body>
	<div class="shell">
		
					<div class="header">
						<?  $header_image = get_theme_mod('header_image',get_stylesheet_directory_uri().'/img/header.jpg');
						echo '<img src="'.esc_url( $header_image ).'" class="img-responsive">';
						?>
					</div>
				
				<div class="row menucont">
					<div class="cont">
						<?php get_template_part( 'inc/contact' ); ?>
					</div>
					<div class="search">
						<?php get_search_form( ); ?>
					</div>
				</div>
		
				<div class="menutop" >
					
					<?php
				$args = array( // Выводим верхнее меню
					'theme_location'=>'top',
					'container_class'=> 'divmenu',
					'menu_class' 	=> 'menuleft',
					'menu_id' 			=> 's',
					'depth'=> '2',
					'fallback_cb' => '',
					'items_wrap'	=>	'<ul id="%1$s" class="%2$s">%3$s</ul>'
					);
				wp_nav_menu($args);
				?>
			</div>