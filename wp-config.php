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
define('DB_NAME', 'bd_exam');

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
define('AUTH_KEY',         'IP2`5A-1-4aDl!G0>b)/|16+x;al!eycvOz+HQ]AeQ4Q!r^P.kh|A ^}c4/qx22l');
define('SECURE_AUTH_KEY',  '8.|)F.x/B/L-=TzEpf6DZ[K:!OCs,:a+_=p-&7j7x4/0LJP:|):-h=p<P%|>gqy8');
define('LOGGED_IN_KEY',    '[$FBNt[`kF:{P@,x5[ua|M_gz&s%AqGnCjCkL:bj`51,fq4&cGDWv#+gl@n>3l8`');
define('NONCE_KEY',        '*7}YjB;8|q`f#h8Xr3?f$i%WLv(xlzAR.-7?CuV2YY&|_c[+ 7h/n|ED*00..9u%');
define('AUTH_SALT',        'FF)GXX%a(G*nPD%l/++Y5ZL1`31R{BG=;|++qMt+z/-AVMBRxXKtwMMtBx2]w?Rf');
define('SECURE_AUTH_SALT', 'mWd;`?df%lP=Y>_hDL(H*d##qhUz(O%=s_:PlNa &O%C9^8%g e)Q7UsO<P3Sm3X');
define('LOGGED_IN_SALT',   'P&*WdvUn.+!mu!CmzQ=_R@`WBdo-d% Lv_}|gdvy[@hMl1H4yXk$X-)yl%G,K(2&');
define('NONCE_SALT',       'N>p7,%-DR2t[)|8j|&DORP051>>nvl_{O?oPwHP+ZD{P(%wGSsZk$-c2M>{?AIdg');

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
