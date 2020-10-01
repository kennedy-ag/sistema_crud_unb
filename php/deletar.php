<?php
	$email = $_POST['email'];

	try {
		$conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('DELETE FROM professor WHERE email = :email');
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		header("Location: ../index.php");
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>