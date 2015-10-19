<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
define('DB_NAME', 'king');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'GkElj+{qW{k1@7,FmdU_+|-]e@Re5uV9niDCU{^7`2z#*aFr~JY2rHnGW|$5%(rY');
define('SECURE_AUTH_KEY',  '%bf<,( U->|H+lrZWY]tTT}z-0hnk5`zf4yq4.?f)uS-*-,olQ|s4ss)I#O@@5^(');
define('LOGGED_IN_KEY',    '#&Hde/(d`zs>05~f`EbRSOF]N<@#eTdq<ZqvMn7Jl`#`;f<El9o2y0,YdD;fOy&.');
define('NONCE_KEY',        '=)#pP.als+#W,a>4iOZ7SqlG[-zC!$M[HYyS+QS.CXC<-5c{x>0 K`(5%LnII3EU');
define('AUTH_SALT',        'ue)xW~Mxq5]vZStbYI)`3b]O_!mq*Lz-A^Ll{ C-0Cwn_k.a0;fl!kP+i-C6T~EB');
define('SECURE_AUTH_SALT', ',)<s&qK=k:Ov7U~MQTzt]IQul7:%*W+S0#|fs_lK1[P7at:QuE$7hK<GtX6?Y&8q');
define('LOGGED_IN_SALT',   'Yq0mB21h9+}&}KC?bNoms=o9~XF{@Nq+!(&g=Vsl`Cz-WlH+a+U li&1N#7hU:~l');
define('NONCE_SALT',       'EBRcisv9ZUW-csa)nRzX^F]Zl$ciu2O?: a_E/,?HZC{s@es$T<(.{!ls+Km@X}3');

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
