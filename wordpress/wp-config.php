<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'project_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'troiswa');

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
define('AUTH_KEY',         '//iQ[swl=O%Q9X$OK9Ix~af+f#-?NvRAs&^E7MJ:6Xnfk&W;W(.OLpfs5h(&X`FL');
define('SECURE_AUTH_KEY',  '+B47Y3?Lfa:g{w)@>-u6T^^k$|Gsz`a[mL2a$!<xc{--:YDi;34E#zmEbTyy9D#+');
define('LOGGED_IN_KEY',    '6*9e9qC;>^#Or!5vbC#c|(z25Y<9m@<@eCU{5U5MJ5mP^7^ #TXIX2TZU4`!-J`^');
define('NONCE_KEY',        'hh00xROJ<p|^XF+vV@r~u]c6tMj+FonJ&yS]-5j-!v~h_d-H{-j5Z|+d-#r^mc+J');
define('AUTH_SALT',        'b!H+hEkSCL,#?+-g VjmC+$g(V!BJR=WEbM#_aI%D2K!t_+++ys|W*JzfsR|Zjs_');
define('SECURE_AUTH_SALT', '~RUfviOI%RLPg7Va74>sc, B*`Zn6SkOUau] G%_K_Sd}&EEO^q n+@EvXk+De6m');
define('LOGGED_IN_SALT',   'erMQ-*+Gl2|$%|xIm2q[-wAy~-P_2dRTU*`^(T:a}([tT&syZUlfzPv_4shO%Ayi');
define('NONCE_SALT',       ',NEXpxkFNEw0S&EY7cI`]>%t]z|i~/udJVvfn?k^%s>u;{S}.t7N4;Wy.Za,@.,g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
