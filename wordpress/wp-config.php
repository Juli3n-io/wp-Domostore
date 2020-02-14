<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp-Domostore' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'O4a62ZOX!/.6#N0g-)<QSHkT4}|CUG//sK2~)u=^c&Iu/6mG@o@JB6jPs2!scUA]' );
define( 'SECURE_AUTH_KEY',  'V$9LqI6xeC7_$<:L:DA6ujbI/D(vpA@DkfKjHwKm*Pj`@E 6x}t#N_HYBzbpu(s[' );
define( 'LOGGED_IN_KEY',    ',=8x8O[zD}{?>64:k0Wab!?/ZfjdHPcA+-)T(QR6UXGw]7l-yI_MKW%dz*<]G!))' );
define( 'NONCE_KEY',        'Gm~>)iCgE!3r5fgW4R+d;WIU?}zD]N=kI[t}A!WaJ+cGPixI8&).?],u]FaTw3DF' );
define( 'AUTH_SALT',        'V.ng~LN4<-V=n$LcyG-lVXQ>AV4LdF&eCrru2>z5-<cFue<~8U93#9*2-},X2o=N' );
define( 'SECURE_AUTH_SALT', 'nJ3zoR;CW^qVlbE1ws>@SkD(&ESIg1n5<3t>?sB`w^)3I9^4o8 s6%xN=FduG9a2' );
define( 'LOGGED_IN_SALT',   'ad20vNMO#@2^,oY&]JQ|Q53ajE>3P|silBDExh~8egLvS00>zKmJN,0{2KR%3hk=' );
define( 'NONCE_SALT',       '8@QI$L_V&wRsjp=Xkrr7*{KGTr!w-Y-]>*x<<Ng)5&vnt9OF`QChHA(`41#r(t0j' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
