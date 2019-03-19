<?php

	session_start();

	if(!isset($_SESSION['todoCollection'])) {
		$_SESSION['todoCollection'] = [];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="jumbotron">
		<h1 class="row justify-content-center">ToDo List</h1>

		<div class="jumbotron justify-content-center">

			<div>
				<form action="storeItem.php" method="get">
					<input type="text" name="addtodo">
					<input type="submit" name="submitForm">
				</form>
			</div>
			
			<div>
				<ul>
					<?php for($i = 0; $i < sizeof($_SESSION['todoCollection']); $i++) { ?>
					<li>
						<form action="delete_done.php" method="get">
							<input style="display: none;" type="number" name="pos" value="<?php echo $i; ?>">
							<?php
								if ($_SESSION['todoCollection'][$i]['isCompleted'] == 0) {
									echo "<p> ". $_SESSION['todoCollection'][$i]['caption'] . "</p>";
									echo "<input type='submit' name='done' value='Done'>";
								} else {
									echo "<p style='text-decoration: line-through;'> ". $_SESSION['todoCollection'][$i]['caption'] . "</p>";
									echo "<input type='submit' name='done' value='Pending'>";
								}
							?>
							<button type="submit" class="close" name="delete">
								&times;
							</button>
						</form>
					</li>
					<?php } ?>
				</ul>
			</div>

			<p><a href="logout.php">Exit Session</a></p>
		</div>

	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>