<?php 

	include 'database.php';

	//check if form submitted
	if (isset($_POST['submit'])) {

		$user = $_POST['user'];
		$message = $_POST['message'];

		//set timezone
		date_default_timezone_set('America/New_York');
		$time = date('h:i:s a', time());

		if (!isset($user) || $user == '' || !isset($message) || $message == '') {
			
			$error = "Please fill in your name and a message";
			header('Location: index.php?error='.urlencode($error));
			exit();

		} else {
			
			$STH = $DBH->prepare("INSERT INTO shouts (user, message, time) VALUES (:user, :message, :time)");

			$STH->bindValue(':user', $user);
			$STH->bindValue(':message', $message);
			$STH->bindValue(':time', $time);

			$STH->execute();

			header('location: index.php');
			exit();
		}
	}

?>