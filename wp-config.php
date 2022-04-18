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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'charity');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Karat#123');

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
define('AUTH_KEY', 'Dli]N2J/xV&wz&+OP6 vQonh~@!86U]?L:b;sx#Hy-a8GzLk77.Cj$]U$jvUBKlP');
define('SECURE_AUTH_KEY', 'lTw<;xCM)39Tm~<(cpU_+^;0?K/zMr.@.tU[NBg3x_hW~i7QWax$4X QN1cyOr%<');
define('LOGGED_IN_KEY', 'A2n3!blY|fYWx_|wW`@{}`_rop(QoD?OCEP>MzYcmNz#BvZ7Mga~$ItGDn8rUs&&');
define('NONCE_KEY', 'C6kQ{jiz*[v.@r4Qp35>0hYge|qzYZ[N4FoN?YzhKD[T *GLjW$dIwx4A-~O0(y-');
define('AUTH_SALT', 'O7t+;KEy^PmQzBak:E@CDf@i+MKLuT0T_XL0e6>]+!FpWG^)EcxTnLYY{Fz9Ag7$');
define('SECURE_AUTH_SALT', 'inO~1na!,$kkDMEueoxH@H~:b:NT+K2Ae#7~{N$>sEd=L1, !|_[<q**Tx)dq87Y');
define('LOGGED_IN_SALT', 'ng4B;Wr/8c3H%4%5r?l1^.T:f6Sy-7GBNZY6gR3A+r)O/x1MYaY49^?ZZu%7G8hS');
define('NONCE_SALT', 'fN~Dx<luG,*@Y5M;B&}5,7w= .j%A]7j*H}gs=Hto$i@i4Qk]UQ^bnJ{8.l|q2wh');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
