<?php
/**
 * Jigsaw, for pretty 'your on the staging server' headsup section...
 * Can include other things, check Jigsaw on github: https://github.com/Upstatement/jigsaw
 * php code sniffer is throwing this error: 12 | ERROR | [x] Line indented incorrectly; expected at least 1 tabs, found 0
 * its lieing, its fine, pgpcs bug, will check in future.
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

if ( isset( $_SERVER['HTTP_HOST'] ) ) {
	$page = esc_url_raw( wp_unslash( $_SERVER['HTTP_HOST'] ) );
}

$message = '<img src="http://www.themustardagency.com/wp-content/uploads/2015/10/The-Mustard-Agency-Web-Design-Salisbury.png" /><h1>Warning: Staging Server!</h1></br>Please be aware this is the <i>staging server</i>, any ammends you make on here <u><b>will NOT affect the content of your <i>live</i> website</b></u> no matter how many times you press save.';

if ( 'staging.mustardwebsites.co.uk' == $page ) {
	Jigsaw::show_notice( $message, 'error' );
}
