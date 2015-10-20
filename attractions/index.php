<?php

	session_start();

	require_once('../helper.php');

	$helper = new DatabaseHelper();

	if (isset($_GET['id'])) { 
		$attraction = $helper->get_attraction($_GET['id']);
		require_once('templates/detail.php');
	} else {
		$attractions = $helper->get_attractions();
		require_once('templates/list.php');
 	} 

?>