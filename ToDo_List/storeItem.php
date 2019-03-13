<?php

	session_start();

	if (isset($_GET['submitForm'])) {
		array_push($_SESSION['todoCollection'], ['caption' => $_GET['addtodo'], 'isCompleted' => 0]);

		header("Location: todo.php");
	}
?>
