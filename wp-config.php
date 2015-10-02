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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'c9');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'petersharp');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8`K(RCV5Y;4O`Np=*hQ6k#T4z||qU25d%ihw({9K^kB!x,^MhDb/h+TQ<I{lc+H{');
define('SECURE_AUTH_KEY',  'ADX&3ye^%f2#ff6TSA9+JI~lPrAz^_e_-+)&GuWN/<~sJL+eo@OR81|+H*p5ZZ4f');
define('LOGGED_IN_KEY',    '@s~QQ=6+rdx]D QQ?.Btk$=d4lf-1bpW=F3L7-^URa.W&R<i-}5j}<~Qq5E*P-/`');
define('NONCE_KEY',        '?+ZCap3bE*O~rgF=crsg5#E`5:_jY}iVXz b_:(pn_Za99x-qfj+4/VX0MAM<M>]');
define('AUTH_SALT',        'g=y9+3}%meT*WO$*FQ(Tmu.ON&8U94,x|ukTaxk?:9h<TNbJh/SCS6x+^UFlfhg+');
define('SECURE_AUTH_SALT', 'dNKW5`rHk2#HmUO)w>vx|*mpT g[_|cB(?+*our-K)KND5G4;f{lv1g8=g#SjY}(');
define('LOGGED_IN_SALT',   '%j[R@f9IC.+ J<F!2on?$Cu`@htZB21EhMY0`8y(+^,l=?bCL9b*=r&i3g-6$!|6');
define('NONCE_SALT',       '/^G7m>xaT:Oyx0>yGpn$f_&YbJC8|}fpkP0IbNw_Zm{|lQ&gmJ?bCJpsir6u3n~Y');

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
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
