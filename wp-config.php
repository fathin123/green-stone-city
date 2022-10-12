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
define( 'DB_NAME', 'wordpress-gsc' );

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
define( 'AUTH_KEY',         '^|6D=Sk<W43g&K<|+hqR1/WqNS2^?mL}0<hde/*+>@WKmLfVImG0&,5XVa;R:M&&' );
define( 'SECURE_AUTH_KEY',  'y~zyx0p].U=Pb.BA5NXCdtAlBqO.BGIG*?0Vy|E<65t`T6hXbg#FE).aK4<TzrIM' );
define( 'LOGGED_IN_KEY',    'l`l8GdX6&TbB5_V<cD$}d0eN|k`NzePUn^$RkAEjs,@e(0q$,L5($+J/J{V/k&?5' );
define( 'NONCE_KEY',        '=z`FJm9Yl|Q$l&:{ScffdfZf9jD?=wZ<feGpsNh^*DT<2>rs>QAmN99Y1nBT-{}-' );
define( 'AUTH_SALT',        '}ttC4x;$[twZxA#I2Wd&q:V1_>v ~ Uc52Jmdj.sB8V:j*EbHJ:t^7wnGz5A$izN' );
define( 'SECURE_AUTH_SALT', 'nN b=#k&Vm__2(xoc_M=}I|Au5>TyN<@;DDz8^KOUV(7TOFB;ivD[Yff{/TB/w?A' );
define( 'LOGGED_IN_SALT',   '<NoB-s%x )`.@4c`&HQ?$E|fyOQoPkqiw ?I(??$qMQFtu-^g9vdgO4O:v7nd*ut' );
define( 'NONCE_SALT',       '.pziA/MQI;):IfuR9rIE>cJy)C1h{= 1#!#]LR*TNcHY^[9H]NyL51T&;e3.#BG+' );

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
