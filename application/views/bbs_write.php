<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
<h1>BBS Write page</h1>

<div id="body">
	<p>It's test page. If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>

	<p>If you would like to edit this page you'll find it located at:</p>
	<code>application/views/bbs_write.php</code>

	<p>The corresponding controller for this page is found at:</p>
	<code>application/controllers/bbs.php</code>

	<p>Returning segment:</p>
	<code><?php print_r($SEGS) ?></code>

	<h2 style="font-weight: normal;">Content:</h2>
	<div>
		<form>
			제목: <input type="text" name="title" value=""><br>
			본문: <br><textarea name="contents" cols="200" rows="50"></textarea>
		</form>
	</div>
</div>
