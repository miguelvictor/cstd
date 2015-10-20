<?php

	define('DATABASE_SERVER_NAME', 'localhost');
	define('DATABASE_NAME', 'cstd_db');
	define('DATABASE_USERNAME', 'root');
	define('DATABASE_PASSWORD', '');

	class DatabaseHelper {

		private $connection;

		public function __construct () {
			$this->connection = new mysqli(
				DATABASE_SERVER_NAME, 
				DATABASE_USERNAME, 
				DATABASE_PASSWORD,
				DATABASE_NAME
			);
			
			if ($this->connection->connect_error) {
				die('Connection Failed: ' . $this->connection->connect_error);
			}
		}

		/**
		 * All the 5 fields must already be in the data associative array.
		 * The data must have been already processed before this is called.
		 * This saves the data to the database.  
		 **/
		public function register ($data) {
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

			$sql = 'INSERT INTO users 
				(first_name, last_name, username, password) 
				VALUES 
				(
					\'' . $data['first_name'] . '\', 
					\'' . $data['last_name'] . '\',
					\'' . $data['username'] . '\',
					\'' . $data['password'] . '\'
				)';

			if ($this->connection->query($sql)) {
				unset($data['password']);
				return $data;
			} else {
				return NULL;
			}
		}

		/**
		 * Checks if a user exist with the given username and password.
		 * Returns an array with user details if found else NULL
		 */
		public function login ($username, $password) {
			$sql = 'SELECT * FROM users WHERE username = \'' . $username . '\'';
			$result = $this->connection->query($sql);

			if ($result->num_rows !== 0) {
				$user = $result->fetch_assoc();
				return password_verify($password, $user['password']) ? $user : NULL;
			}

			return NULL;
		}

		/**
		 * Checks if the given username already exists.
		 */
		public function username_already_exists($username) {
			$sql = 'SELECT id FROM users WHERE username = \'' . $username . '\'';
			$result = $this->connection->query($sql);
			
			return $result->num_rows;
		}

		/**
		 * GET /attractions
		 */
		public function get_attractions() {
			$sql = 'SELECT * FROM attractions';
			return $this->connection->query($sql);
		}

		/**
		 * GET /attractions/<id>
		 */
		public function get_attraction ($id) {
			$sql = 'SELECT * FROM attractions WHERE id = ' . $id;
			$result = $this->connection->query($sql);

			if ($result->num_rows !== 0) {
				/** get comments **/
				$sql = 'SELECT comments.id, comment, date_published, concat(users.first_name, \' \', users.last_name) as user, users.username FROM `comments` inner join users ON comments.user_id = users.id WHERE attraction_id = ' . $id;
				$result2 = $this->connection->query($sql);
				$comments = as_array($result2);

				$sql = 'SELECT avg(rating) as avg_rating, count(*) as users_count FROM `ratings` WHERE attraction_id = ' . $id;
				$result3 = $this->connection->query($sql)->fetch_assoc();

				$attraction = $result->fetch_assoc();
				$attraction['comments'] = $comments;
				$attraction['rating'] = $result3;
				return $attraction;
			}

			return NULL;
		}

		/**
		 * PUT /attractions/<id>
		 */
		public function update_attraction ($id, $data) {
			$sql = 'UPDATE attractions SET title = \'' . $data['title'] . '\', description = \'' . $data['description'] . '\', picture = \'' . $data['picture'] . '\' WHERE id = ' . $id;
			return $this->connection->query($sql);
		}

		/**
		 * DELETE /attractions/<id>
		 */
		public function delete_attraction ($id) {
			$sql = 'DELETE FROM attractions WHERE id = ' . $id;
			return $this->connection->query($sql);
		}

		/**
		 * POST /attractions
		 */
		public function new_attraction ($data) {
			$sql = 'INSERT INTO attractions 
				(name, description, picture)
				VALUES
				(
					\'' . $data['name'] . '\',
					\'' . $data['description'] . '\',
					\'' . $data['picture'] . '\'
				)';
			return $this->connection->query($sql);
		}

		public function new_comment ($attraction_id, $user_id, $comment) {
			$sql = 'INSERT INTO comments
				(attraction_id, user_id, comment)
				VALUES
				(
					' . $attraction_id . ',
					' . $user_id . ',
					\'' . $comment . '\'
				)';
			return $this->connection->query($sql);
		}

		public function new_rating ($attraction_id, $user_id, $rating) {
			$sql = 'select * from ratings where attraction_id = ' . $attraction_id . ' and user_id = ' . $user_id;
			$result = $this->connection->query($sql);

			if ($result->num_rows === 0) {
				$sql = 'INSERT INTO ratings
					(attraction_id, user_id, rating)
					VALUES
					(
						' . $attraction_id . ',
						' . $user_id . ',
						' . $rating . '
					)';
			} else {
				$sql = 'UPDATE ratings SET rating = ' . $rating . ' WHERE attraction_id = ' . $attraction_id . ' AND user_id = ' . $user_id;
			}

			return $this->connection->query($sql);
		}

		public function raw_query ($sql) {
			return $this->connection->query($sql);
		}
	}

	function is_authenticated () {
		return isset($_SESSION['user']);
	}

	function is_admin () {
		return is_authenticated() && $_SESSION['user']['is_admin'];
	}

	function as_array ($cursor) {
		$result = array();

		while ($row = $cursor->fetch_assoc()) {
			$result[] = $row;
		}

		return $result;
	}

	function format_attraction_rating ($attraction) {
		if ($attraction['rating']['avg_rating'] !== NULL) {
			return $attraction['rating']['avg_rating'] . ' stars (' . $attraction['rating']['users_count'] . ' user(s))';
		}

		return 'No ratings yet';
	}

	function upload_file ($file, $desired_file_name) {
		$result = array();

		$image_file_type = explode('.', $file['name']);
		$image_file_type = $image_file_type[count($image_file_type) - 1];
		$target_dir = 'uploads/';
		$target_file = $target_dir . $desired_file_name . '.' . $image_file_type;
		$result['path'] = '/' . $target_file;

		$check = getimagesize($file['tmp_name']);
		if ($check !== false) {
			$upload_ok = 1;
		} else {
			$result['error'] = 'File is not an image.';
			return $result;
		}

		if ($file['size'] > 1000000) {
			$result['error'] = 'File is too large.';
			return $result;
		}

		if ( ! move_uploaded_file($file['tmp_name'], $target_file)) {
			$result['error'] = 'An error occurred while uploading file.';
			return $result;
		}

		$result['path'] = '/attractions' . $result['path'];

		return $result;
	}

?>