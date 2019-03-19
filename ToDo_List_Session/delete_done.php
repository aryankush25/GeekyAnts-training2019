<?php

	session_start();

	if (isset($_GET['delete'])) {

		array_splice($_SESSION['todoCollection'], $_GET['pos'], 1);

		header("Location: todo.php");
	}

	if (isset($_GET['done'])) {

		if ($_SESSION['todoCollection'][$_GET['pos']]['isCompleted'] == 1) {
			$_SESSION['todoCollection'][$_GET['pos']]['isCompleted'] = 0;
		} else {
			$_SESSION['todoCollection'][$_GET['pos']]['isCompleted'] = 1;
		}

		header("Location: todo.php");
	}

?>