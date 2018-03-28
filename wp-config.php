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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'Sd2EEUaF2nMZ*baeJN~!#._q3Rrb&pxd&HI=nk, pYEunVI9?{)1Mrd9NhblWb]_');
define('SECURE_AUTH_KEY',  'nbt1UM---@2ey(7a3Z#{:@[DR8SB&x%XJ18smhi!~E*+oj(1mjQdw>Q}&=}16](O');
define('LOGGED_IN_KEY',    '$y S83tfbliAt}z-Nq)Oxi:[~=s6QU3Xxh/SKJtM<R hzHJ?Wd{iP{D}:&Tu1ZV~');
define('NONCE_KEY',        'fDW<Gk;p%vkd-g0?Cw}H)uE?>gDJ*BGq7E2fkK&3oJk6F@dOmSt@-aiF$1{CQ$QX');
define('AUTH_SALT',        ' U(/yLM1tE8<D8;F9TPb>;wT%^{BhaCvnrfI[cI,38SPHzD c=gMA`W[duEy-9~(');
define('SECURE_AUTH_SALT', '4(8ug9CMU-N5V,N+Y%bSq[Un6<jF#|49>rWp}K}$4T%6DBNpQdh)~4<6UBRzFInQ');
define('LOGGED_IN_SALT',   'IK52=,#dA$nQhiZO,XC120Mr9]sc>3<8=1~Y!eK{0&%,Bs|.#Eevs$bd3YJEZi;H');
define('NONCE_SALT',       'j^My#A6$}XF.0W:;N 3pN=8)ti8nd+a9FW>aBY1Kk0aD7s/Q&Fm]<.q1P_}*|SuM');

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
