<?php

	session_start();

	if (isset($_SESSION['user'])) {
		header('Location: /');
		exit;
	}

	require_once('helper.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		/** assigning post variables to php variables **/
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		/** initializing field error container **/
		$errors = array();

		/** checking for empty fields **/
		if (empty($first_name)) {
			$errors[] = 'First name is required.';
		}
		if (empty($last_name)) {
			$errors[] = 'Last name is required.';
		}
		if (empty($username)) {
			$errors[] = 'Username is required.';
		}
		if (empty($password1)) {
			$errors[] = 'Password is required.';
		}
		if (empty($password2)) {
			$errors[] = 'Password confirmation is required.';
		}

		/** if errors array is not empty, exit and show it to user **/
		if (!empty($errors)) {
			require_once('templates/signup.php');	
			exit;
		} 

		/** REGISTRATION DATA VALIDATION **/

		/** initialization of database helper **/
		$helper = new DatabaseHelper();

		/** check if the passwords match **/
		$password1 = trim($password1);
		$password2 = trim($password2);
		if ($password1 !== $password2) {
			$errors[] = 'Passwords doesn\'t match.';
		}

		/** check if username is not yet taken **/
		$username = trim($username);
		if ($helper->username_already_exists($username)) {
			$errors[] = 'Username already exists.';
		}

		/** if error array is not empty, exit and show it to user **/
		if (!empty($errors)) {
			require_once('templates/signup.php');	
			exit;
		}

		/** all is well **/
		$first_name = trim($first_name);
		$last_name = trim($last_name);

		/** bundle data to a one compact array **/
		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'username' => $username,
			'password' => $password1
		);

		$user = $helper->register($data);
		if ($user !== NULL) {
			session_start();
			$_SESSION['user'] = $user;
			header('Location: /');
		} else {
			$errors[] = 'Some internal server error has occurred. Please try again later.';
			require_once('templates/signup.php');
		}
	} else {
		require_once('templates/signup.php');
	}

?>