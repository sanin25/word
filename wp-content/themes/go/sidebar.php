<?php
/**
 * Чистый Шаблон для разработки
 * Шаблон сайдбара, все виджеты добавляйте из админки
 * http://dontforget.pro
 * @package WordPress
 * @subpackage clean
 */
?>

<?php if ( is_active_sidebar( 'true_side' ) ) : ?>
 
	<div id="true-side" class="sidebar">
 
		<?php dynamic_sidebar( 'true_side' ); ?>
 
	</div>
 
<?php endif; ?>