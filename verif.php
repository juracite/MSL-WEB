<?php 
	session_start();
	header('Content-type: text/json; charset=UTF-8');
	if(isset($_POST['username']) && isset($_POST['password'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == $_SESSION['username'] && $password == $_SESSION['password']){
			echo '{"etat":"Success"}';
			$_SESSION['connecte'] = '1';
		}
		else {
			echo '{"etat":"NotSuccess"}';
		}
	}
?>