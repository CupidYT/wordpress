<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'g7w={>&9Tq`@EoM[d[I4OaX5,y>[!{,~jCk~)%C#_/Y{sMkz~wWM7[iSeHW1NrO^' );
define( 'SECURE_AUTH_KEY',  'wM.g~o|P:5dy.O{tFf> #MI$1*DmC2Ap<ewdF9/Vg{9U=jN$ox*QWn$vt4kBISE-' );
define( 'LOGGED_IN_KEY',    '7y zYY ^<7mB 0`f3_cG0e!j]MW#,X^ofo5*R8QQz%o9M,oYFPFWJ)vdR0-tt*e[' );
define( 'NONCE_KEY',        '&C+rrZAPtysm&c[1s,WC8f[uQ+V@-j86  :B~lx[0vyS#Y+1)J]2gWM(-VrF<(d_' );
define( 'AUTH_SALT',        'I.Kf8j7zPQ9yNRl^@]q={<)NdZ4t)mX) f{68r6~87,y^x~;7/+w/<g^QOIDLg~ ' );
define( 'SECURE_AUTH_SALT', '*LOoVz52dUv5SFE5B_^Cu;^R]_C$G?%.( ZpehJg/~+Ct|=Q4hO/t:=KeGtA<;^?' );
define( 'LOGGED_IN_SALT',   '1h?NH}!K^+munt!4encJB7i.= d[u,0LRE1p+Oi/@f!Xj]xxN}=S/n(?xl.>Ia|,' );
define( 'NONCE_SALT',       'qQ&Y1b 4M_/q25qm-YaT8H(+ER`v*`6(?AYLC7IQ?+!jMn@4hJ((zSy/Baz,~>;/' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
