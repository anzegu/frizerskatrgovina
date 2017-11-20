<?php
	session_start();
        session_destroy();
        unset ($_SESSION['steamid']);
        unset ($_SESSION['steam_uptodate']);
	header ("Location: ../../prikaz_izdelkov.php");


