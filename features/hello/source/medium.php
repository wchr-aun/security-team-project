<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
	// Get input
	$target = $_REQUEST[ 'txt' ];

	$cs = array('ghostbusters','hellokitty','vader');

	if(strpos($target, 'wget') !== false)
		$target = 'Nice try, Teletubby! But you need to upload a teletubby file at the upload page.';
	else if(strpos(strtolower($target), 'cat') !== false)
		$target = "Nice try, Teletubby! But you need to open a file in the shell!";
	else if(strpos(strtolower($target), '/can_upload/') !== false && strpos(strtolower($target), 'php') !== false)
		$target = 'Nice try, Teletubby! But you need to run the teletubby file at the Who ? page.';

	// Set blacklist
	$substitutions = array(
		'& ' => '',
		';'  => '',
		'| ' => '',
		'^ '  => '',
		'` ' => '',
		'( '  => '',
		') ' => '',
		'$ '  => ''
	);

	// Remove any of the charactars in the array (blacklist).
	$target = str_replace( array_keys( $substitutions ), $substitutions, $target );
	$cow = $cs[array_rand($cs)];
	// Determine OS and execute the ping command.
	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
		$cmd = shell_exec( 'cowsay ' . $target );
	}
	else {
		// *nix
		$cmd = shell_exec( 'cowsay -f '.$cow .' '. $target );
	}

	// Feedback for the end user
	$html .= "<pre>{$cmd}</pre>";
}

?>
