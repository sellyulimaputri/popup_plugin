<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'AwKu,GkL.a? r 33etTGvEj&_rJBD{!I+wqcA8%s1CAfl$oLXB^zsXqe`}Y$i?qn');
define('SECURE_AUTH_KEY',  'Queox~rIJwqC1=5$<k&*|[(PVQls6-Nv^W@pWN9(<$.C9*>92yX1@#KKP@=+l->]');
define('LOGGED_IN_KEY',    '`WXV#OIK1*8CxIQ!dF(>$gZ]7<^?-HbMiViFiTw9m_tC4M4v+x^?@XE4{M2jH)bD');
define('NONCE_KEY',        '>~AF/asgAb0gkTWQE9k t8agCt6k#Qm,U)*(.%rW%NkGL,ymI`dex]JJFXXS{;D&');
define('AUTH_SALT',        'fB6_ci?l2!p}6>_]1:=_NU5Q}M{Y?SE$&+G7k 9eB`|21&BgVj_}@j$vg^:8~4W?');
define('SECURE_AUTH_SALT', 'V?h9%z=nZ|WzUC.Yg@3WpCI*71@L~h[JN#rSLBx.+[_XZe#ovx3JZIzO&CKFeRQ)');
define('LOGGED_IN_SALT',   'T^#XXG:C72Ksq?&~I_m}4Dh2/G#p4AXg^u:)(dGE)ubU(753>SZP;<3ebNK:Ps}[');
define('NONCE_SALT',       ' t4Z06.=Av2l`<+lD+n@M0q=]R1i1b*vLh7(6N9LVRUQp0Iw2L95QO2)ej4kt.yI');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

// define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', true);
// define('WP_DEBUG_DISPLAY', false);
// @ini_set('display_errors', 0);