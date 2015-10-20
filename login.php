<?php

	session_start();

	if (isset($_SESSION['user'])) {
		header('Location: /');
		exit;
	}

	require_once('helper.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$helper = new DatabaseHelper();

		$user = $helper->login($username, $password);

		if ($user !== NULL) {
			$_SESSION['user'] = $user;
			header('Location: /');
		} else {
			$errors[] = 'Username and password doesn\'t match';
			require_once('templates/login.php');
		}
	} else {
		require_once('templates/login.php');
	}

?>