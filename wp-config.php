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
define( 'DB_NAME', 'codeq' );

/** Database username */
define( 'DB_USER', 'codeq' );

/** Database password */
define( 'DB_PASSWORD', 'WMA54(.r_]Sw8@*w' );

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
define( 'AUTH_KEY',         '(Gj%*_y(rI*5rAO^M3_5oXZ|O}2 M*4ILC<NTaD(8|^U-fGxeQ4;,M(hFP-$Vn6i' );
define( 'SECURE_AUTH_KEY',  ':b>=s1kV!M:#>mjH{AaJl+S!t-wic^&a8q hBKA-zQy[:ao24VQcY8Ui[YYiF-{k' );
define( 'LOGGED_IN_KEY',    'Mc1Uz7&KFSlR`YJo9w{)t#HBk8K0(s=<ZEoKSXBbkEtxSB6d`@qP:``vIj],_Wa0' );
define( 'NONCE_KEY',        '9pvr=`:Pltehw@(,IelxdkYRps,V1}o3CavL,.d0>+4j `H<C,Qf&h8E9:YB1$Qg' );
define( 'AUTH_SALT',        '8N|_D{LpSbdk:-A]2|DO7z<FuIB-AP@aa=dXFj(mq-{ R-`*L%hRtj:wW#j]hOwH' );
define( 'SECURE_AUTH_SALT', 'Pi}:>,dcS%F>.5+vCF_^=p?Zw@k(!AZ@!;hJPiC&e]i/!T3N;Og_)D59dzJV;O+B' );
define( 'LOGGED_IN_SALT',   'DzC3<hd46lb+vVL<3,On)3LL#hetn1Rhh{} +XgvpA?@4:~i0%0l:JXW-6_{m1a:' );
define( 'NONCE_SALT',       'l;Ta}D1:;fJDN(h24F%g#g1^^Q,s<vLck/Zjzp?^6p?603_8h].#,$t**}I?TkYe' );

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
