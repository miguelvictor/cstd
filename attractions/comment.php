<?php

	session_start();

	require_once('../helper.php');

	if (is_authenticated() && $_SERVER['REQUEST_METHOD'] === 'POST') {
		$attraction_id = $_POST['attraction_id'];
		$comment = trim($_POST['comment']);
		$user_id = $_SESSION['user']['id'];

		$helper = new DatabaseHelper();
		$helper->new_comment($attraction_id, $user_id, $comment);
	
		header('Location: /attractions?id=' . $attraction_id);
		exit;
	}

	header('Location: /attractions');

?>