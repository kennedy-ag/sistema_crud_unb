<?php

	$email = $_POST['email'];
	$novo_dado = $_POST['campo'];
	$campo = $_POST['radios'];

	try {
		$conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		switch ($campo) {
			case 'nome':
				$stmt = $conn->prepare('UPDATE professor SET nome = :novo_dado WHERE email = :email;');
				break;
			case 'especialidade':
				$stmt = $conn->prepare('UPDATE professor SET especialidade = :novo_dado WHERE email = :email;');
				break;
			case 'email':
				$stmt = $conn->prepare('UPDATE professor SET email = :novo_dado WHERE email = :email;');
				break;
			case 'lattes':
				$stmt = $conn->prepare('UPDATE professor SET lattes = :novo_dado WHERE email = :email;');
				break;
		}

		$stmt->execute(array(
		':email' => $email,
		':novo_dado' => $novo_dado
		));

		header('Location: ../index.php');

	} catch(PDOException $e) {
	  echo 'Error: ' . $e->getMessage();
	}
?>