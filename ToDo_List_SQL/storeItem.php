<?php

	include('connection.php');

	if (isset($_GET['submitForm'])) {

		$caption = $_GET['addtodo'];

		$query = "INSERT INTO `todoData` (`id`, `caption`, `isCompleted`) VALUES (NULL, '$caption', '0');";

		mysqli_query($conn, $query);

		header("Location: todo.php");
	}
?>
