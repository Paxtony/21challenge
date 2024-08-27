<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress-study');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', '127.0.0.1:3306');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tG~5<qJnRsnWWtc;9c)&glJnex+Q:c9y;pR4*a&!Jd<C_.+ko7)yH!!?H_yt0`C3');
define('SECURE_AUTH_KEY',  'SV|%U9)Q/E.L-VvNfRg]8Vop@#_<Lt?K]V|suiGk}(2+cUN|JsKU#>x!F23^VX)b');
define('LOGGED_IN_KEY',    '*o1|@Dy5D|t*$,0IP1<4DzH5ml*r-H@2g@VCa}9CgmLf=!O@`cxAHuy0Cc*lGIM}');
define('NONCE_KEY',        'K=3?t^;n2_+bJ*J++Gw]x2ImPQF@V:j=`2;c7:;6T*bVW8+n9_YX] |iGdLw0=yB');
define('AUTH_SALT',        'tPu+9cQ%5;;^o9gGKa7lu+:yD8-Ph,Q3W-~Wsc|c%@?LeU.%`1~9/M6#I;n_EKz!');
define('SECURE_AUTH_SALT', 'C.P[`Tz?9?F1iW~=H9x= N!hQ;ROJ9`1u1QH$3SJaWirZ`dp7M=`R^n;ouUw,t*/');
define('LOGGED_IN_SALT',   'q920Nz80v-OZT}Q[,Ti=jZy42!.w&hn?Pv{~2zUQ+o(dmu{@k-5d.fh0mCR:%_~Z');
define('NONCE_SALT',       'W~G>-]AR3Ur}7YM75`[/}v:PMMv]Kjqs)x/xx,H|QNeFuXl8?5vleb?L,M)||P)Y');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


/* Add any custom values between this line and the "stop editing" line. */
define('WP_HOME', 'http://localhost:8080');
define('WP_SITEURL', 'http://localhost:8080');
