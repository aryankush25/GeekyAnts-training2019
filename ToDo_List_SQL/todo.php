<?php

	include('connection.php');

	$query = "SELECT * FROM todoData";
	$result = mysqli_query($conn, $query);

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
					

					<?php if (mysqli_num_rows($result) > 0) { ?>
						
						<?php while ( $row = mysqli_fetch_assoc($result) ) { ?>

							<li>
								<form action="delete_done.php" method="get">
									<input style="display: none;" type="number" name="pos" value="<?php echo $row["id"]; ?>">
									<input style="display: none;" type="number" name="isComplete" value="<?php echo $row["isCompleted"]; ?>">

									<?php
										if ($row['isCompleted'] == 0) {
											echo "<p> ". $row['caption'] . "</p>";
											echo "<input type='submit' name='done' value='Done'>";
										} else {
											echo "<p style='text-decoration: line-through;'> ". $row['caption'] . "</p>";
											echo "<input type='submit' name='done' value='Pending'>";
										}
									?>
									<button type="submit" name="delete">
										Delete
									</button>
								</form>
							</li>
						<?php } ?>

						<?php 

						} else {
							echo "<p>Add ToDos</p>";
						}
						mysqli_close($conn);
						?>
				</ul>
			</div>
		</div>

	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>