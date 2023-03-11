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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nanami' );

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
define( 'AUTH_KEY',         '{=swYPq=IA5P905(._^|Iy)Q$c*q;)%>#>+=4d{.Y8Q;iA?@oClaX/xqRYh#s;)S' );
define( 'SECURE_AUTH_KEY',  'IVl~Fxme=0Y=+FMVE:qm),C+jJzw1bqCSOl@<To[r)EKN{U>)khsNBBrAi4pO|$*' );
define( 'LOGGED_IN_KEY',    'Jh`1V|xjI /D^+3tjqq`On-6KsE!,5i`2#0V4grBnh3r]k(?#hRKerOJ25=xk!3h' );
define( 'NONCE_KEY',        'R4$Yo+*N&VT5KJ]Nbs e2<69aj9savh<(Hj;WWY4[s})Xz=J*YWOON;zwA&k;] ]' );
define( 'AUTH_SALT',        'o*N.*xXmHWTbF@I!cxu)Ad_fGR^=tbE~pfdGc[ocM6p&~.<`Do_pB#wJ^Ym<SO(k' );
define( 'SECURE_AUTH_SALT', 'b[.n-I= (M%vLKocI`r:<Oq9Sm2|l=_BTwlP?mbfp)K4SBps>0X?j11A~lN0!jYU' );
define( 'LOGGED_IN_SALT',   '`k1TQ.RXTaUFk<F2Q@0@BvA wnVL%1+)fN7/&bp%3{71DHac0j5!>%FyAZ%i|a8O' );
define( 'NONCE_SALT',       'P#H~ZYXzg:pUDG~ieWIK$CsG(>rSg4W8$,-%#,fwq84HPcYsGu1zNWWN_;s-nUJX' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
