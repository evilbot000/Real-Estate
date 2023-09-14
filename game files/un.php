<?php
	$YourName = $_POST['YourName'];
	$YourEmail = $_POST['YourEmail'];
	$Subject = $_POST['Subject'];
	$YourMessage = $_POST['YourMessage'];

	// Database connection
	$conn = new mysqli('localhost', 'root', '', 'tests'); // Change database name to "tests"
	if ($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed: " . $conn->connect_error);
	} else {
		// Use backticks for column names with spaces
		$stmt = $conn->prepare("INSERT INTO registration (`Your name`, `Your Email`, `Subject`, `Your message`) VALUES (?, ?, ?, ?)");
		if (!$stmt) {
			echo "Error in query preparation: " . $conn->error;
			$conn->close();
			exit;
		}
		
		$stmt->bind_param("ssss", $YourName, $YourEmail, $Subject, $YourMessage);
		$execval = $stmt->execute();

		if ($execval) {
			echo "Registration successfull...";
		} else {
			echo "Error in registration: " . $stmt->error;
		}
		header("location: http://localhost/urban%20nest/#home");
		
		$stmt->close();
		$conn->close();
	}
?>
