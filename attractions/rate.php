<?php

	session_start();

	require_once('../helper.php');

	if (is_authenticated() && $_SERVER['REQUEST_METHOD'] === 'POST') {
		$attraction_id = $_POST['attraction_id'];
		$rating = $_POST['rating'];
		$user_id = $_SESSION['user']['id'];

		$helper = new DatabaseHelper();
		$helper->new_rating($attraction_id, $user_id, $rating);
	
		header('Location: /attractions?id=' . $attraction_id);
		exit;
	}

	header('Location: /attractions');

?>