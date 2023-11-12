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
define('DB_NAME', 'wp-avanzado-02');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'hBbr1xHOtj/LQboE8Ii=KTjr^-bs<uWgrl}?taYPcw4Y.36DJc0rD,Vs/CB&KWe]');
define('SECURE_AUTH_KEY',  '[-/RV5f|h+P^+?_Uwl&`}*XV^kuH6X#^sq1i?8_,pRSTGwqLECV.I!~@N~xA_K1o');
define('LOGGED_IN_KEY',    'I1g.5,voDxf^UHk7D#}{@i2+E=v6lHlPbSzf_E!GZQpn!ct;2n*7xNhilGlZWW,#');
define('NONCE_KEY',        'P4.|$QNLD1rP-u4}=TC{1`i,M?)01c;q_1xKoyL&tIvOJwUN*-bAm`/1QsR1#0Q!');
define('AUTH_SALT',        'M#A]PG2pmRf{L&$BR#/uNFIqh%Zytc7nr)=@SYH?g}ngdG0md9&2]I8SmG?H=)f0');
define('SECURE_AUTH_SALT', '{md*zVtl?&<>P/Ze<2]12&i{p1)Nf *Pf;)uI:yEb]M0XnNc?HklLf%G`Y]h_Xys');
define('LOGGED_IN_SALT',   'M/^=cbE( 45y<8PAuno)_JnVZLvdLu:X!F$#wzVM|=(U&o]UW;goZp9z_^5l]$(,');
define('NONCE_SALT',       '8/J@z_Ne:2er)7U|v<J()V!kwqGDC}Bwa!i<;Q%.fLVk5Tm?N-wHTh+.HXUs-A ?');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
