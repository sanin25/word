<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон вывода поста
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
get_header(); // Подключаем хедер?> 
<div class="single">

<hr>
<?php comments_template( '', true ); // Комментарии ?>
</div>
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>