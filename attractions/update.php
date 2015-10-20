<?php

	session_start();

	require_once('../helper.php');

	if ( ! is_admin() || ! isset($_GET['id'])) {
		header('Location: /');
		exit;
	}

	$helper = new DatabaseHelper();
	$attraction = $helper->get_attraction($_GET['id']);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = trim($_POST['name']);
		$description = trim($_POST['description']);
		$picture = $_FILES['picture'];

		$errors = array();
		$queries = array();

		if (!empty($name)) {
			$queries[] = 'name = \'' . $name . '\'';
		}

		if (!empty($description)) {
			$queries[] = 'description = \'' . $description . '\'';
		}

		if ($picture['error'] === 0) {
			$upload_result = upload_file($picture, time());
			if (isset($upload_result['error'])) {
				$errors[] = $upload_result['error'];
			} else {
				$queries[] = 'picture = \'' . $upload_result['path'] . '\'';
			}
		}

		if (!empty($errors)) {
			require_once('templates/update.php');
			exit;
		}

		$sql = 'UPDATE attractions SET ' . implode(', ', $queries) . ' WHERE id = ' . $attraction['id'];
		//die('updating: ' . $sql);
		$helper->raw_query($sql);

		header('Location: /attractions?id=' . $attraction['id']);
	} else {
		require_once('templates/update.php');
	}

?>