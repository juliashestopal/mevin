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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'idd9higqj5se0h215jsof1efnlu70m3gcibzjj3mvqh4tmqx1d4uo8izntq5omva' );
define( 'SECURE_AUTH_KEY',  '6ecabqzbsg0pdbvd7dbdzeninekp3tazc336k5n94ze99fqj5mtdvoctfbdktdlo' );
define( 'LOGGED_IN_KEY',    'bgg7wi1txhynjjjxcuxjbaupyuzy0x71pvdwgdena5r6rhkuaigptsgiszueqf80' );
define( 'NONCE_KEY',        'aa28gafl9xtvkd1jb9txmknkwm2qkubtub87oizoru3pyypayqakus4j9qfwctbz' );
define( 'AUTH_SALT',        'w4gvckwokjuibtd8xwy74m3uvs8hbiefftzo4zkpx2xnbialkqpiypn9zvh7ow0j' );
define( 'SECURE_AUTH_SALT', 'k7mwimr2hbiodsqmk43vjz9deg9b6o3a8sirvg3iz1poippy2xk4se97syh1sc9x' );
define( 'LOGGED_IN_SALT',   'dedoyvy257eialjukiwfbogvh7bc5kvcyugmnmuijt7l1eoztupd8vspzjicn089' );
define( 'NONCE_SALT',       'u4egszmmoc96qjomfzav5pf42049b7atbppwxyrv2ufomfnex8xcv2okiaig1fs3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_am_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
