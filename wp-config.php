<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'db_wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'wpuser');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'localhost7*');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'C+i9X&>4`@6~!.;$r;=f*mhP+DyhH|$-)Dx{<9~P=p4EuZm|Q-YsP[c ubaTFqUS');
define('SECURE_AUTH_KEY', 'BkZ]nq?yQ0@59lv%^M8qH{,{9>]]L+~XbdffP- e=hmbWvG(+9;B|f<dx_#a@ss[');
define('LOGGED_IN_KEY', '82R-&]P])9/l}RYQ5r672+{{ :>H<8:uD$+,hH,CM$`SlP} k(tiN~3;4Ua!Q,vJ');
define('NONCE_KEY', '&{S3y=c =h5D,9#(-aj0g%$/nieQ2NSAW0acT)@3dN8vdVqCZeF=i]7>u?m}0tJX');
define('AUTH_SALT', 'HDATa:jE[ziE9Y-ePI`}85.h/I&780G6h-qhj;=`n8/1ZPgua+4)/2O4p)|Ihse[');
define('SECURE_AUTH_SALT', 'n>@=-[w}w{yQ9cl%w#me/nBQ/6?-%>$dZ6Kbg#SNcOB(.Ebbp8vL#d<rQ|~sxtrV');
define('LOGGED_IN_SALT', '_&AtQhg+r$j^vE4^6> !Qlp{w4+3apo~+cTcbRm#cB:ds*UNLI_>V[A7>J^.j]+f');
define('NONCE_SALT', 'l!^-i,}|PXp^+<>u[6s8+TNzQ1n`+~}84#Fkk0XuiYJJ3v4U+MgB?#a50~wq;}+p');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

