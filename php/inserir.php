<?php

	try {
		$nome = $_POST['nome'];
		$especialidade = $_POST['especialidade'];
		$email = $_POST['email'];
		$lattes = $_POST['lattes'];

		$conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('INSERT INTO professor VALUES(:nome, :especialidade, :email, :lattes)');
		$stmt->execute(array(
			':nome' => $nome,
			':especialidade' => $especialidade,
			':email' => $email,
			':lattes' => $lattes
		));

		header("Location: ../index.php");

		} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>