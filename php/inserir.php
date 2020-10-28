<?php

	try {
		// Declaração das variáveis com os valores capturados do formulário
		$nome = $_POST['nome'];
		$especialidade = $_POST['especialidade'];
		$email = $_POST['email'];
		$lattes = $_POST['lattes'];

		// Conexão com o banco de dados
		$conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Prepara uma query para ser executada
		$stmt = $conn->prepare('INSERT INTO professor VALUES(:nome, :especialidade, :email, :lattes)');
		// Define o valor de cada variável utilizada na query
		$stmt->execute(array(
			':nome' => $nome,
			':especialidade' => $especialidade,
			':email' => $email,
			':lattes' => $lattes
		));

		// Direciona o usuário para a página especificada
		header("Location: ../index.php");

		// Exibe uma mensagem de erro, caso algo não tenha sido executado corretamente
		} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>