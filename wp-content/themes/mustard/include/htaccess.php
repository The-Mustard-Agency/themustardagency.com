<?php
/**
 * Htaccess
 *
 * Htaccess update, runs throguh permalinks in settings.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Ketchup
 * @author     Your Name <yourname@example.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 *
 * @var type $rules Description.
 */

/**
 * This will update the htacces for better seo and varnishing when permalinks are set
 *
 * @since 0.1
 *
 * @param string $rules Being a htaccess thing.
 */
function my_htaccess_contents( $rules ) {
	return $rules . '
  # TN - START EXPIRES CACHING #
  ExpiresActive On
  ExpiresByType text/css "access 1 month"
  ExpiresByType text/html "access 1 month"
  ExpiresByType image/gif "access 1 year"
  ExpiresByType image/png "access 1 year"
  ExpiresByType image/jpg "access 1 year"
  ExpiresByType image/jpeg "access 1 year"
  ExpiresByType image/x-icon "access 1 year"
  ExpiresByType application/pdf "access 1 month"
  ExpiresByType application/javascript "access 1 month"
  ExpiresByType text/x-javascript "access 1 month"
  ExpiresByType application/x-shockwave-flash "access 1 month"
  ExpiresDefault "access 1 month"
  # TN - END EXPIRES CACHING #
  # TN - BEGIN Cache-Control Headers
  <ifModule mod_headers.c>
  <filesMatch "\.(ico|jpe?g|png|gif|swf)$">
  Header set Cache-Control "public"
  </filesMatch>
  <filesMatch "\.(css)$">
  Header set Cache-Control "public"
  </filesMatch>
  <filesMatch "\.(js)$">
  Header set Cache-Control "private"
  </filesMatch>
  <filesMatch "\.(x?html?|php)$">
  Header set Cache-Control "private, must-revalidate"
  </filesMatch>
  </ifModule>
  # TN - END Cache-Control Headers
  Redirect /humans.txt ' . esc_html( get_bloginfo( 'template_directory' ) ) . '/humans.txt
  ';
}

add_filter( 'mod_rewrite_rules', 'my_htaccess_contents' );
