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
define('DB_NAME', 'walter_handbags');

/** MySQL database username */
define('DB_USER', 'walter');

/** MySQL database password */
define('DB_PASSWORD', '6dai3RK89O');

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
define('AUTH_KEY',         'Po;z=DEokp?Pm=ACu]a9Xv[dl5E`il..KNOe-If*~p[81/DzuR fv-;Z(>%/|s&g');
define('SECURE_AUTH_KEY',  'ips3=K^SV42ci+vvIkA_`Ow #~`c{R$a!EA!^S.X-:=S%ObW~MC}|-){ZcdFmZ#1');
define('LOGGED_IN_KEY',    'GkLX%n+A#+K0LIB,j~g3*f&Sb4B@3 +*;,L3%<VL ug$4tOpJO*lOm1`]He~3D. ');
define('NONCE_KEY',        '2-L!su9Pk5g$/T8`_+9by5/?#lG,@UK;JH__..W m3DOQi}dGa`3?qN6)QZ,}`zE');
define('AUTH_SALT',        'R|c1F2.K}_{kGRtxU4Vxr(ZVPK|qGA}C)cr-wn9IR^/$>}3^AbvL0+1-Ch7i|]3j');
define('SECURE_AUTH_SALT', '1/&H{].|<n-]_K,Hbm{}?- ALOqP-e_>Zx`rlJW.R-w:Np1ZEn8%T]G[eQx|L-Zk');
define('LOGGED_IN_SALT',   ';r2m]XT0@j3#@?1O+??%ZrB-|1v3f**5<vi|Dq5dRmKM(XZbdlc?p+4<hW-{X[j%');
define('NONCE_SALT',       'HppZYs$1M%2]#BZK]|_3)&D1d6n6 6NYur%bsYj4fZ*nr4k5r]#R |?SCsi#]gU/');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
