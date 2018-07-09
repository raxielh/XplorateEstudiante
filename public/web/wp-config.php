<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'xplorate_estudiantes');

/** MySQL database username */
define('DB_USER', 'xplorate_estudiantes');

/** MySQL database password */
define('DB_PASSWORD', 'xplorate_estudiantes');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'fg}DIOp}}pG3-iA_%iQ_sMKH*SCI!b4iIGHEg#rnU=lo4@2<:$;#Da|fa!=ds*4~');
define('SECURE_AUTH_KEY',  'FzqFf_(KvQXH6*L2Jv|X9U62QDZ$UUgU5m=*KC$kvm/qm>}pUPgx13u7 >#0]Z:/');
define('LOGGED_IN_KEY',    '6?em5cL/jY^N?xEWD#M7vUj5z4dUzu:Ejj+T8sq.|mag2E,Cer=YEoJ`aEW_Hy&r');
define('NONCE_KEY',        ']>.FF5!{unDV_r]x2K#!9=vga!]#bJET>7>S%*wKBgaMfVgx|#TA.iG9>T+5zf=K');
define('AUTH_SALT',        'B!CN+Y6rzsugv)BdCE%,U7+gWE@v|hFRro:V1<]%,b9PaU1v` Z_T-A[^3yCohj]');
define('SECURE_AUTH_SALT', 'u|d5-wsb=d?4w;/$` v+nnuhBA2k/-L}(bGIMIe!*``o^5s7}|ataW/KE++:Hlu=');
define('LOGGED_IN_SALT',   '{8so[:SeKe+TOJj#Bl^0})n6qm2mel0Nyd;DF4^1JM~],YW{UzEu?5^/+n/%N+a>');
define('NONCE_SALT',       '!>NT-HYgCZ]]aK.%ZVbv&K=T0(KDXB^AcFA$!aw>@y@<pcALnk9hqmdxZ9YQ}v4~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
