<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'srv165174_atqnKi7Fii' );
/** Имя пользователя MySQL */
define( 'DB_USER', 'srv165174_wanswr' );
/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'q0147852' );
/** Имя сервера MySQL */
define( 'DB_HOST', 'mysql-165174.srv.hoster.ru' );
/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );
/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );
/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'yCu?K[AWq5PLMJbJhfepDdE7xS8[G3mE4VBpQeD,QgWLoRXZ9vo_LWo0D4X1RydJ' );
define( 'SECURE_AUTH_KEY',  'Yk25W,KC_M_obwl5[qDAFjj9miCvqzUsinNr6cnGH5DrVxwZuAWC9Xx7i?L3KrIu' );
define( 'LOGGED_IN_KEY',    'Wv9m[FFw_XJEC8pWV2jPvkoK?PiN]HAM,OUnU7iAREvXv1kx_?wsbPEWNbRrjS?w' );
define( 'NONCE_KEY',        'a![aQE]Rhzy3QTFqaL?]2OuodZPGqPRlkbtAusOS82hkCqQ6zs_bRk!D[JegfAeD' );
define( 'AUTH_SALT',        'TH98f13_L]nEDJz53ml,qAdGyOw32fKyH55ER2RvI1Fx!vR3LnDqjOaAC94YRcCA' );
define( 'SECURE_AUTH_SALT', 'hFsPE8,xsnO6Wl5xvIYKQfQdD2s2uVtYkGNeXGzRIi4IWTwjFCtrKPuBZzKIMKwg' );
define( 'LOGGED_IN_SALT',   'lHxQre]xtsu_TG17FRN_43jWwaTZzAlA7mtLulwdDGMKmZhlzCG3Dt5p0WIoCr25' );
define( 'NONCE_SALT',       'Yv?,B]RZJztrKWzQCAGrzlD,sL2OUR3RjCg?6[Dh?qwKgtn!0fTpaWwBJ2aPmrOJ' );
/**#@-*/
/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';
/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/* Это всё, дальше не редактируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';