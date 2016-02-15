<?php
/**
* Чистый Шаблон для разработки
* Шаблон сайдбара, все виджеты добавляйте из админки
* http://dontforget.pro
* @package WordPress
* @subpackage clean
*/
?>

<ul>
	<li><i class="fa fa-phone fa-2x "></i> (+38)067-600-10-66</li>
	<li><i class="fa fa-phone fa-2x "></i> (+38)099-759-93-94</li>
	<li><a href="vk.com/id24463375" class="vk"><i class="fa fa-vk fa-2x"></i> </a></li>
	<li><a href="#form" id="poch"><i class="fa fa-edge fa-2x "></i></a></li>
	<li><a href="#" class="ok"><i class="fa fa-odnoklassniki fa-3x fa-spin "></i></a></li>

</ul>
<!-- Форма отправки почты -->
<div class="hidden semdmail">
	<form id="form"> 
	<p>Отправить письмо</p>
		<div class="formblock">
			<label for="name">Ваше имя:</label>
			<input type="text" name="name" required>
		</div>
		<div class="formblock">
			<label for="mail">Ваша почта:</label>
			<input type="text" name="mail" >
			<input type="hidden" name="action" value="my_mail" />
		</div>
		<textarea name="textarea" cols="30" placeholder="Задать вопрос" rows="10"></textarea>
		<br/>
		<br/>
		<button>Отправить</button>
	</form>
</div>



