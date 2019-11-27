<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = '---' . $page[ 'title_separator' ].$page[ 'title' ].$page[ 'title_separator' ] . '---' ;
$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<center>
	<h1>Where is Flag ?</h1>
	<p>Flag: Find me , please ~~~</p>
	<img src='dvwa/images/teletubbies.jpeg' height='380' width='650'>
	<br>
	<p><img src='dvwa/images/laa-laa.png' height='30' width='30'> Laa-Laa: If you stuck
	<img src='dvwa/images/tinky-winky.png' height='30' width='30'> Tinky Winky: Go to seek for 
	<img src='dvwa/images/dipsy.png' height='30' width='30'> Dipsy: Oracle
	<img src='dvwa/images/po.png' height='30' width='30'> Po: he may give some useful advices to you!</p>
	</center>

</div>";

dvwaHtmlEcho( $page );

?>
