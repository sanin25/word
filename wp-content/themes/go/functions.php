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
		'left' => 'Левое меню',
		'right' => 'Правое меню'
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

/*Подключаю скрипты  */

     function register_my_script()
 	{
     wp_enqueue_script( 'my-script', get_template_directory_uri().'/js/myscript.js',array('jquery'));
    }
    
    add_action('wp_enqueue_scripts', 'register_my_script');

    function register_my_sc()
    {
     wp_enqueue_script( 'my-sc', get_template_directory_uri().'/js/jquery.fittext.js',array('jquery'));
    }
    
    add_action('wp_enqueue_scripts', 'register_my_sc');



/*Подключаю css стили */
  function register_my_animate()
{
 wp_enqueue_style( 'my_animate', get_template_directory_uri().'/css/animate.css');
}
add_action('wp_enqueue_scripts', 'register_my_animate');
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
    	$mail= trim($_POST["mail"]);
    	$text = trim($_POST["textarea"]);
    	$message = "Имя: $name \nПочта: $mail \nТекст: $text";
		$pagetitle = "Новая заявка с сайта \"$sitename\"";
		$headers[] = 'From: Миша <tootii@mail.ru>';
		$headers[] = 'Content-type: text/html; charset=utf-8';
		 
    	 if (wp_mail($recepient, $pagetitle, $message, $headers))
    	 	echo "Сообщения отправлено!";
    	 else
    	 	echo "Не отправлено!";
    	 die();
    }
    add_action('wp_ajax_my_mail', 'my_mail_callback');
	add_action('wp_ajax_nopriv_my_mail', 'my_mail_callback');
/*Краткое описание */

    function segment_length ($length) {
        return 40;
        }
        function segment_more($more) {
        return '...';
        }

        function announcement($length_callback='', $more_callback='') {
           global $post;
           add_filter('excerpt_length', $length_callback);
           add_filter('excerpt_more', $more_callback);
             $output = get_the_excerpt();
             $output = apply_filters('wptexturize', $output);
             $output = apply_filters('convert_chars', $output);
             $output = ''.$output.'';
        echo $output;
        }
    
?>