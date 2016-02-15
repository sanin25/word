<?php
/**
 * Чистый Шаблон для разработки
 * Функции шаблона
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */

/*Подключаем меню*/
add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'top' => 'Верхнее меню',
		'left' => 'Нижнее'
	) );
});
add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(254, 190); // Задаем размеры миниатюре

/*Подключаю сатбар*/
function true_register_wp_sidebars() {
 
	/* В боковой колонке - первый сайдбар */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);

}
 
add_action( 'widgets_init', 'true_register_wp_sidebars' );

/*Подключаю скрипты  bootstrap*/

     function register_my_script()
 	{
     wp_enqueue_script( 'my-script', get_template_directory_uri().'/js/myscript.js',array('jquery'));
    }
    add_action('init', 'register_my_script');

/*Подключаю css стили */

function register_bootstraps()
 	{
     wp_enqueue_style( 'my-bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.css');
    }
    add_action('wp_enqueue_scripts', 'register_bootstraps');
function register_mystyle()
 	{
     wp_enqueue_style( 'my-mystyle', get_stylesheet_directory_uri().'/css/style.css');
    }
    add_action('wp_enqueue_scripts', 'register_mystyle');

    /*ajax запросы*/
    
    function my_mail_callback(){
    	$recepient = "tootii@mail.ru";
    	$sitename = "Название сайта";
    	$name = trim($_POST["name"]);
    	$phone = trim($_POST["mail"]);
    	$text = trim($_POST["textarea"]);
    	$message = "Имя: $name \nТелефон: $phone \nТекст: $text";
		$pagetitle = "Новая заявка с сайта \"$sitename\"";
		$headers[] = 'From: Миша <tootii@mail.ru>';
		$headers[] = 'Content-type: text/html; charset=utf-8';
		 
    	 if (wp_mail('tootii@mail.ru', 'Какая-то тема', 'Какое-то сообщение', $headers))
    	 	echo "Сообщения отправлено!";
    	 else
    	 	echo "Не отправлено!";
    	 die();
    }
    add_action('wp_ajax_my_mail', 'my_mail_callback');
	add_action('wp_ajax_nopriv_my_mail', 'my_mail_callback');
?>