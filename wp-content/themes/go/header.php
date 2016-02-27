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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 3.0, user-scalable = yes, width = device-width">
     


 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
 </script>
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
		<div class="table">
		<div class="header">
			<!-- Картинка шапки  -->
		</div>
		<div class="wrapper clearfix">
			
			<div class="table-row">
		
			