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
define( 'DB_NAME', 'webbanhang' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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

define( 'AUTH_KEY',         'eXg{ovX,i:_ rRPRZN5_N.Glhx^~UWZ<f|6L,/p!Vz`bkRm2fH[7:4cC_!B+=<0r' );
define( 'SECURE_AUTH_KEY',  '_5Um}IwgckREoA&tDm/yzzO9&L?.rlLcGt@]K%s3 55NpM%K .Zoccsd)j0)=m$C' );
define( 'LOGGED_IN_KEY',    'S|J%<: Lq5nHZ (9x#e[u}or|v1=7oJKb9kAAwc5R8,FiQW@}l1:h%WwUs>=0A}`' );
define( 'NONCE_KEY',        '?D66%8q) nJa)D!]q+UeFs,K*Vycv3Zod*@ &0N]~[qd|`8*7Q6V;3,J7aBUM$-~' );
define( 'AUTH_SALT',        ',zrrfWaAm:q18FnJ}A@<.3pKqLp_nbQM5A[S&)01*)N`5;V}Z0{rFj=X8La|TS/<' );
define( 'SECURE_AUTH_SALT', '4PQO5paNeOA987D)9!OcMhu~MROk,sXMj6I% `$i0JWoVVe?!N}JKOD`&v j[:]2' );
define( 'LOGGED_IN_SALT',   '$a2r5_OBW0Ib{E1Nre!},o90J+@$=31)z%%qwC/M4W!pR?KaYK/bjdQX=),F}@9Z' );
define( 'NONCE_SALT',       ';lo`DF*@r}<#J,>#o[86#PEa>Kz*Il$g%F$`2+#z<7/}]PH;|w,|SGJ3E5rHGp$H' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
