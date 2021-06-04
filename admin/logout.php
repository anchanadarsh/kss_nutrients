<?php
	require_once("models/session.php");
    require_once("models/model.php");
	    $user_logout = new Models();
		$user_logout->logout();
		$user_logout->redirect('index.php');
