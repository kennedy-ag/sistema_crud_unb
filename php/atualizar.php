<?php
	// Declaração das variáveis provenientes do formulário
	$email = $_POST['email'];
	$novo_dado = $_POST['campo'];
	$campo = $_POST['radios'];

	try {
		// Conexão com o banco de dados escolhido
		$conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Verifica qual campo foi selecionado e gera uma query SQL
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

		// Define o que significa cada uma das variáveis utilizadas nas consultas acima
		$stmt->execute(array(
		':email' => $email,
		':novo_dado' => $novo_dado
		));

		// Direciona o usuário para a página definida
		header('Location: ../index.php');

	// Mostra uma mensagem de erro na tela, caso algo não tenha sido executado corretamente
	} catch(PDOException $e) {
	  echo 'Error: ' . $e->getMessage();
	}
?>