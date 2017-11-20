<?php
	$con = mysqli_connect ("localhost", "root", "")
	or die ("Povezovanje ni mogoče");
	
	$db = mysqli_select_db ($con, "frizerska_trgovina")
	or  die ("Baza ni dostopna");
	
	mysqli_set_charset($con, "utf8");

