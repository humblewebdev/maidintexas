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
define('DB_NAME', 'webteg_wp13');

/** MySQL database username */
define('DB_USER', 'webteg_wp13');

/** MySQL database password */
define('DB_PASSWORD', 'H^tp&Wpvj652)@8');

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
define('AUTH_KEY',         'P4P3Gr8gw3oj7EzFTRYwgYSI7VeW48WzARk6kAdXpXjveUqVSRSbxH6jVbYvAAS6');
define('SECURE_AUTH_KEY',  'sYU0l2QJrIinfy3cEyGUDsZ8cSbcAabkwqZsRsLJaFNCbbQxwzFsZoomKT9FeW6r');
define('LOGGED_IN_KEY',    'Jy7rtGGID6sr2e2gJpbxQCK9XPx6ZdSbXqDbF2Df1rODRc4rxQAsRrgAWFuxo110');
define('NONCE_KEY',        'a83w3NwemMtllBSpdtwTv9Tuiz1KFg80o94OC80367GXOVkHRV1gYBf9tX4FNXBR');
define('AUTH_SALT',        'MrI4B7KMSJlrGN8hUhXY11qR6zf2GRcybCu0gIB99nWSX74nCiZzUkafzbakmFn7');
define('SECURE_AUTH_SALT', 'hKCANsznLLIiwZ3NlPALz7Y9uobgwMLUDionpjzZCLNor6l5DhYxhNqHw30RNQYJ');
define('LOGGED_IN_SALT',   'a5zN1FVUMZEPnosgVmEAI5NL2ULfB0lIsH82hB12QJr6orqmI5WWbOvHaE5yYOVi');
define('NONCE_SALT',       'wzdcHzUc1mgD8MzluoxpbGibo52Sg6v5sDSNp5bfk2R3v2muJKI2rS4JATGHS6nm');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
