<?php
/**
* Чистый Шаблон для разработки
* Шаблон сайдбара, все виджеты добавляйте из админки
* http://dontforget.pro
* @package WordPress
* @subpackage clean
*/
?>

	<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cont.gif" alt="">

<!-- Форма отправки почты -->
<div class="hidden semdmail">
	<form id="form"> 
	<p>Отправить письмо</p><br/>
		<div class="formblock">
			<label for="name">Ваше имя:</label>
			<input type="text" name="name"  placeholder="Имя" required>
		</div>
		<div class="formblock">
			<label for="mail">Ваша почта:</label>
			<input type="text" name="mail"  placeholder="Почта">
			<input type="hidden" name="action" value="my_mail" />
		</div>
		<textarea name="textarea" cols="60" rows="10" maxlength="1500" placeholder="Задать вопрос" ></textarea>
		<br/>
		<br/>
		<button>Отправить</button>
	</form>
</div>



