<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wordpress');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?`2!3ege$>{eY+P|{FO<PSy9e}XP}keJbAlb:{~&Vy}nOBZ>.sGSgOTqJ8*|s#%^');
define('SECURE_AUTH_KEY',  'FTG!.+cUfz8({x/b+q=)H69Z2c{gs0+qNP]/:cO&6b&#f8s|I1h/dW^T.3z}-Kqa');
define('LOGGED_IN_KEY',    'T{M.w7I:G%aCoEr=6djg IX8i`+E+@TNz|#2uI9/0w by7gn;u1{c0hF|%#Z<quR');
define('NONCE_KEY',        'U}^@fj~>(}RLa~zXHaP,J>iAO+U,hkGGD0zKkiu[4`X0cDKU-G{D4u|VX+HFmhSJ');
define('AUTH_SALT',        '4Ol@jj:F*Rq.{1u~Sf[b0^?#CjOjG?au2/dv+iSn*RG/p@{%wFVGKF|J6C3>;`ki');
define('SECURE_AUTH_SALT', ']TU5y~q-F9VPV<9T|D)+;+9XWWL {Z+-Hs|lJ-q#jLir!z0~]jV12pB`9W#FKoA|');
define('LOGGED_IN_SALT',   '_r$s8DM9do1}6fQvy2(Dsw/QK1J|HTG_X_50V)D?wZ$bW`g,sfFa5Hy0@jj&{qd>');
define('NONCE_SALT',       '!pkgXSWoo<k=Hv>rk2bW.7t+h{k#yany&|AL/Teqpr8dZdd;H?o>|wgbbO{+i:I,');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
