<?php

	include('connection.php');

	if (isset($_GET['delete'])) {

		$pos = $_GET['pos'];

		$query = "DELETE FROM `todoData` WHERE `todoData`.`id` = $pos";

		mysqli_query($conn, $query);

		header("Location: todo.php");
	}

	if (isset($_GET['done'])) {

		$pos = $_GET['pos'];
		$isCompleted = $_GET['isComplete'];

		if ($isCompleted == 1) {

			$query = "UPDATE `todoData` SET `isCompleted` = '0' WHERE `todoData`.`id` = $pos;";
			mysqli_query($conn, $query);

		} else {

			$query = "UPDATE `todoData` SET `isCompleted` = '1' WHERE `todoData`.`id` = $pos;";
			mysqli_query($conn, $query);

		}
		header("Location: todo.php");
	}
?>