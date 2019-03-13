<?php

	if (isset($_POST["submit"])) {
		$number = $_POST["number"];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Submit Page</title>
</head>
<body>
	
	<div>

		<h1>Table of <?php echo $number . ": "; ?></h1>
		
		<?php
			$i = 1;
			while ($i <= 10) {

				$multi = $number * $i;

				echo $number . " X " . $i . " = " . $multi . "<br>";

				$i = $i + 1;
			}
		?>

	</div>
</body>
</html>