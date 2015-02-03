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
switch ($_SERVER['SERVER_NAME']) {

  case "local.halodome.com":
    define( 'DB_NAME',     'halodome' );
    define( 'WP_SITEURL',  'http://local.halodome.com' );
    define( 'WP_HOME', 'http://local.halodome.com' );
    define( 'DB_USER',     'root' );
    define( 'DB_PASSWORD', 'root' );
    define( 'DB_HOST',     'localhost' );

  case "halodome.nowwhat.hk":
    define( 'DB_NAME',     'nowwhat_halodome' );
    define( 'WP_SITEURL',  'http://halodome.nowwhat.hk' );
    define( 'WP_HOME', 'http://halodome.nowwhat.hk' );
    define( 'DB_USER',     'nowwhat' ); // replace with live server settings
    define( 'DB_PASSWORD', '20273214' );
    define( 'DB_HOST',     'localhost' );
}

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
define('AUTH_KEY',         'Dy [&TeN$phl98rz_^={%hv6L0eZ8FY%X(cFo:]{8fQycRo|*aP-yB8*e>qXS,N}');
define('SECURE_AUTH_KEY',  'EwM8}JR515}]!V9al+y></sS8+1j}+,yOY#[je|FW3UJpmk_k* TRHL_:-?+4/1C');
define('LOGGED_IN_KEY',    '2-zYEf$6h#-{,q tmVsuA1-SCeC)S^l|0JvN0w|&9X{N#Gs{h5=P1,O^`aHQ;H|R');
define('NONCE_KEY',        '10?j&U8EYT!HMO0s 7jhaG`~A-34[nW@V-#:X/jBExWXt&MNS^Rs~ h2YZc>ae+l');
define('AUTH_SALT',        '|4#(9,JCFex[8mFi_K8VzwN~xtt|:y#>LUd>Ao$etYdsf  +k`:?+m46r-D_]Xf?');
define('SECURE_AUTH_SALT', 'gZ[I;0HUSfh<CgZm~U0$;eO1,x5[#yBYSI9$K^}UTKLk8]EfAHP_uPSnFELmkmy^');
define('LOGGED_IN_SALT',   'A)_AAJ2p|PAu 2.{i/4E/S[m*:<kh2lw|)uO8I>BixhzoR)w27!?)z90]L=})M}Y');
define('NONCE_SALT',       '9YMRB.XTC+~1IZdRQ+`>k>C.<VxLckGhX7wSWsZ?HOtCJY5dkqRxi)JnQF^ygL4r');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'halodome_';

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
define('WP_DEBUG', false);

define('WP_ENV', 'development');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
