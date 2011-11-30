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
define('DB_NAME', 'local_wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'some_pass');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1:3306');

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
define('AUTH_KEY',         'Pbsyn.b,9O_|?Yd|=D-,1%_-lMm;0)IBg0)?MH3N,Sn[P#<k9e=dU+48d-e_n^Kb');
define('SECURE_AUTH_KEY',  '+-J&*TG0%0EVts%/|:>DkjG@zSrU9[d?Vgz>8yt!0_,Wj)ui>)*`inW}B~X!oK4 ');
define('LOGGED_IN_KEY',    'Z/[8P[40$]!.o.lPx(R(3KPw;$o`S~&#A|lvrAwtB-krOv;tMwwy+Kw]`R</L-fF');
define('NONCE_KEY',        'Ru3_>t<=IE[2I9C.O2|5.JxX7YG[?fH|Qa^)?f9?A;@KC3I.9Ur{TO2g+]In+Ik}');
define('AUTH_SALT',        '-O=Y/_ 7;VUk}H+AEf-$v;~vYv3p91%Xn3ljjFrGfvg[)^Jp=+C]Sd?/irAqbcUR');
define('SECURE_AUTH_SALT', '@bPO+;`PILbc:jRlH3pAw0%x]uVK Q;n#F&3<&a$Xsfr|7Fz;FF#Epdy^|OcDp^o');
define('LOGGED_IN_SALT',   '|%j19k+VJ~isB}z{hid6+v)35~OELR_Nq#qyIn-g)-!Bw{ysT#,h<h0&(sJhig2+');
define('NONCE_SALT',       '.sK0X>q<T]A<jp@aELz&0|g8d:}F=ZZgvr;lh(XT(BoC=x&#jpC+h/i /Umg*:?B');

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
