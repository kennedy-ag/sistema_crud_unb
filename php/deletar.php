<?php
// Captura os dados enviados pelo formulário referente
	$email = $_POST['email'];

	try {
		// Conexão com o banco de dados
		$conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Cria a query SQL para ser executada
		$stmt = $conn->prepare('DELETE FROM professor WHERE email = :email');
		// Define o valor da variável declarada na query
		$stmt->bindParam(':email', $email);
		// Executa a query dentro dos parâmetros no banco
		$stmt->execute();

		// Direciona o usuário para a página especificada
		header("Location: ../index.php");

	// Exibe uma mensagem de erro, caso algo não tenha sido executado corretamente		
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>