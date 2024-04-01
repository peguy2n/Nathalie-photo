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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'h#U4{G5>c5i^73-6312ll4.J{vn%FfE-|VjLHv~mo5&{,&&cV{kOocO3jD2 slVm' );
define( 'SECURE_AUTH_KEY',   'Be|cm5q,0jlyQPF@XPbJ96GH/H;j=mph~gJ`p^~em/-`WA*iB#}IrY1SkW/O?YOS' );
define( 'LOGGED_IN_KEY',     'G{RcR2gK%ooq*&6bO3A|}uSwx;}4BH*dny`S^To&ol.rw~)(+st@LC/s($.}t9Pg' );
define( 'NONCE_KEY',         ']u67+ZAu >k}+ylh6`+-D(3#=.;8[{0l~JV$H(.;38z1+9olJ?KQyN+m.bB(dT2|' );
define( 'AUTH_SALT',         'zlwHF%e?;ju%oy>Jx}?:3ToHcct7mb)Nm)vE_Zm: p^8 i^@khmGz#xoe$kk;FOz' );
define( 'SECURE_AUTH_SALT',  'd4v!Q{X*tF6*F7BuS2[`mnyRHBx}SP6JMu%x3l0M4:N|%lQr,$;.A>@]_Ey2vS,3' );
define( 'LOGGED_IN_SALT',    'r ),(7dW(gfp/Emb1flvd}Pfr6q 0@N@~<O|=$9#!g%/TRs7NtjRN$8R.5l$d[&`' );
define( 'NONCE_SALT',        'K&Se9(Ibajuiyzh7~ZMx`PJsjOj<sEG(I,hV[wtY!x>*#g&Va9O`-<ty|KKrADzK' );
define( 'WP_CACHE_KEY_SALT', 'a^uSj)~2 o07eyR9EvSH C)0N<K#Rb9nCf6UQ,z| <]ihrQK-=CHCx^IjKG3uA|9' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
