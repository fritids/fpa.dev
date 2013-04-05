<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fpa_wpdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nIjX3{.E;qTMm+2{.eSpiL<xt]h~tl_]H9]phZw|C5~9OldV0!z08VN8-rn,4RJ}N');
define('SECURE_AUTH_KEY',  'IqY7>^7TqjXu$3{$XPHet].mI2]H~5;~eH5Si*+sO81OSplW1|!8NkdG_sk!8VN8z');
define('LOGGED_IN_KEY',    '-9:OG[lWOl!81!dG8Rh~-}oYQnv}|vRJBYn,$gB},FXunby^7BYQI.um.{M6{M_9');
define('NONCE_KEY',        '@4Z4c>F7^cNFcaxpa5*x;DaSK#wp|:KD:pkd-[G8_dOGdz0[zV80Nczs,gQJfn,@r');
define('AUTH_SALT',        'TPqmQ{*6i*tm_]HA]meWt_91+WH9Ws[_sS1[GWtld8[|CKhZK|80JYvnV0@z0Mfc');
define('SECURE_AUTH_SALT', '0}@4JgYQ{^73QJ3v<*6Lib^qi*+XH9We+m<DaSD~iax#D5:pZSpx:#-1o|@oJ:|C');
define('LOGGED_IN_SALT',   'xp]-s[_l#5SGd-sg@|C4|hYRo@4}vRC4Rn,$nJ},BQngyUE6Tbyrb7;<IXumP{+u{');
define('NONCE_SALT',       'ie.uPLiaL#pi*;LDW1_-19WO9-sk!0NG[lVOl!80!cG8Vk!zrN70MRJgv0,Byn,$f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
