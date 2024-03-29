<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Comment pls' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'comment';

dvwaDatabaseConnect();

if (array_key_exists ("btnClear", $_POST)) {
	$query  = "TRUNCATE guestbook;";
	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
}
$vulnerabilityFile = 'impossible.php';

require_once DVWA_WEB_PAGE_TO_ROOT . "features/comment/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Comment here!</h1>

	<div class=\"vulnerable_code_area\">
		<form method=\"post\" name=\"guestform\" \">
			<table width=\"550\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\">
				<tr>
					<td width=\"100\">Name *</td>
					<td>
						<select name=\"txtName\">
						  <option value=\"Tinky Winky\">Tinky Winky</option>
						  <option value=\"Dipsy\">Dipsy</option>
						  <option value=\"Laa-Laa\">Laa-Laa</option>
						  <option value=\"Po\" selected>Po</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width=\"100\">Comment *</td>
					<td><textarea name=\"mtxMessage\" cols=\"50\" rows=\"3\" maxlength=\"50\"></textarea></td>
				</tr>
				<tr>
					<td width=\"100\">&nbsp;</td>
					<td>
						<input name=\"btnSign\" type=\"submit\" value=\"Post\" onclick=\"return validateGuestbookForm(this.form);\" />
						<!-- <input name=\"btnClear\" type=\"submit\" value=\"Clear\" onClick=\"return confirmClearGuestbook();\" /> -->
					</td>
				</tr>
			</table>\n";

if( $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "			" . tokenField();

$page[ 'body' ] .= "
		</form>
		{$html}
	</div>
	<br />

	" . dvwaGuestbook() . "
	
</div>\n";

dvwaHtmlEcho( $page );

?>
