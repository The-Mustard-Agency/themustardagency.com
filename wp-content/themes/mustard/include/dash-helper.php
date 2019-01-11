<?php
/**
 *   Contact form on dashboard...
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

add_action( 'wp_dashboard_setup', 'my_custom_dashboard_widgets' );

/**
 * Add widget to dash.
 */
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget( 'custom_help_widget', 'Website Support', 'custom_dashboard_help' );
}

/**
 * The helper.
 */
function custom_dashboard_help() {  ?>

<div>
<h1>Welcome to the <?php echo esc_html( get_bloginfo( 'name' ) ); ?> Website</h1>
<h3>For help and support please use the following form:</h3>
<br>

	<?php
	if ( isset( $_POST['submit'] ) && isset( $_POST['email'] ) && isset( $_POST['first_name'] ) && isset( $_POST['last_name'] ) && isset( $_POST['message'] ) ) {
		$to         = 'alex.woollam@themustardagency.com';
		$from       = wp_verify_nonce( sanitize_email( wp_unslash( $_POST['email'] ) ) );
		$first_name = wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) );
		$last_name  = wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) );
		$subject    = 'Form submission';
		$subject2   = 'Copy of your form submission';
		$message    = $first_name . ' ' . $last_name . ' wrote the following:' . "\n\n" . wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['message'] ) ) );
		$message2   = 'Here is a copy of your message ' . $first_name . "\n\n" . wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['message'] ) ) );
		$headers    = 'From:' . $from;
		$headers2   = 'From:' . $to;
		mail( $to, $subject, $message, $headers );
		mail( $from, $subject2, $message2, $headers2 );
		echo 'Mail Sent. Thank you ' . esc_html( $first_name ) . ', we will contact you shortly.';
	};
	?>

<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

</div>

	<?php
}
?>
