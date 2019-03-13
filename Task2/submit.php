<?php

	if (isset($_POST["submit"])) {
		$name = $_POST["name"];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Submit Page</title>
</head>
<body>
	<p><?php echo "Hey $name, nice to meet you. I am PHP"; ?></p>
</body>
</html>