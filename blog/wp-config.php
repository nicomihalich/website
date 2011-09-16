<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'm1c%sSd');

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
define('AUTH_KEY',         'Xq6;%%*/Jht8yeicd]2TQPdyTt1s.[B~>!QV:(AdY!*v)dCnC%PMmUpNV,7.dBtf');
define('SECURE_AUTH_KEY',  '5icjTciCafW;4@NdRhp#O8O9OH_#<}2w|aek?CILv6pC*F9RKR9_YhrnyFM!f58O');
define('LOGGED_IN_KEY',    'rQ>F?(mDam$.B8:dq6;}O5JCR;WRe!i8$^;,e.dm QcV3!bw.T({iIferMR*8l}k');
define('NONCE_KEY',        '3v<SpVV9K50=&goF?LVm>yIbGLl<TIvz@rj`tz=r{:8mnqWtAj0U#>2T43Q[X8m2');
define('AUTH_SALT',        '>0>nuRvAQ.{V]xp.x_b(c/YxB/M@6@KRN|74208@Md#rcaG;NR2Wo>n+&S&?H8z)');
define('SECURE_AUTH_SALT', 'KwD)qxN9KL(W}eQ1n/7X0q^jUk)@+2Et+~<i6]HD1*boM!C63s*c@ r{S0(1y( F');
define('LOGGED_IN_SALT',   '<1|Kz51^^+FRFx^<J|Qk$ysEI=!X()M{CpN7`!b)yI=Jq}-csnXEIwoNH:V+%maX');
define('NONCE_SALT',       '9olzDklwmC/q(q=:+L-7VWRF_@{Yg{wYebTmFs?=#4G0Ti^U@U[LE#[~ml#ziSE(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
