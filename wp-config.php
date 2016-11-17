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
define('DB_NAME', 'u950435654_jcms');

/** MySQL database username */
define('DB_USER', 'u950435654_jenil');

/** MySQL database password */
define('DB_PASSWORD', 'common4all');

/** MySQL hostname */
define('DB_HOST', 'mysql.hostinger.in');

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
define('AUTH_KEY',         'ZI`U@>|Z^YC`eyXpQp&gl3F@L{8X~VQ6E76D3(,R=I~Z[[]kZxOo)wd^}zt<LlZP');
define('SECURE_AUTH_KEY',  'E1Kk83iISr95*.c{nN[<oOBG#rGI39?FTZ,T7Lo_:sQ/D(;PN^S]AB_f,v1k7$HX');
define('LOGGED_IN_KEY',    'W}qtt xj*a5hMDDp{v2|6W=&1rb-oB`PeQgu#{+[|RLWc=<P-#ttecSir0^7UY8j');
define('NONCE_KEY',        '>tshiM8t@a0DJVum!fn =[f/6SxWgPSl_$Z-hx5;Et~5.b|g,6$`s5Ux=4FP .0q');
define('AUTH_SALT',        ';+6!2)^bh(.EmOFtz{zdp>}i2VJ=XHPWXh8;@.@F>Z}HlVML 9ivj&$!Zd@M+Ha[');
define('SECURE_AUTH_SALT', 'B?!L/!@_6@lj^zI`bD,c/6n}oc`UM@:VSr+@/5xGKq{vN[6n)?(FN:S:Kgot?+&P');
define('LOGGED_IN_SALT',   'AepM lLk^+`PWRvrJL|8(n}[X3}31F,mOppMR4@18v=U[~=>Ef([{YgMBH+O2X}W');
define('NONCE_SALT',       'EuD0Ad<6b_IA&&&0UVNWzQWu1*[CG9,XtK)c@dU5ATY,d-O@E@LA2i{][<B:lKF&');

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
