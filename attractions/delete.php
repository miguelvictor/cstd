<?php 

	session_start();

	require_once('../helper.php');

	if ( ! is_admin()) {
		header('Location: /');
		exit;
	}

	if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
		$helper = new DatabaseHelper();
		$helper->delete_attraction($_GET['id']);
	}

	header('Location: /attractions');

?>