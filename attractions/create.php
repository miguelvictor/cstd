<?php

	session_start();

	require('../helper.php');
	
	if ( ! is_admin()) {
		header('Location: /');
		exit;
	}

	$helper = new DatabaseHelper();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$errors = array();

		$name = trim($_POST['name']);
		$description = trim($_POST['description']);

		if (empty($name)) {
			$errors[] = 'Attraction\'s name is required.';
		}

		if (empty($description)) {
			$errors[] = 'Attraction\'s description is required.';
		}

		if ($_FILES['picture']['error'] === 4) {
			$errors[] = 'Please select a picture of the attraction.';
		}

		if ( ! empty($errors)) {
			require_once('templates/create.php');
			exit;
		}

		$upload_result = upload_file($_FILES['picture'], time());
		if (isset($upload_result['error'])) {
			$errors[] = $upload_result['error'];
		}

		if ( ! empty($errors)) {
			require_once('templates/create.php');
			exit;
		}

		$data = array(
			'name' => $name,
			'description' => $description,
			'picture' => $upload_result['path']
		);

		$helper->new_attraction($data);
		header('Location: /attractions');
	} else {
		require_once('templates/create.php');
	}

?>