<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">
		<title>Sistema CRUD</title>
	</head>
	<body>

		<!-- Barra de navegação -->
		<nav id="nav-main" class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="#">UnB</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<button type="button" class="btn btn-secondary m-2" data-toggle="modal" data-target="#modal-inserir">
						 	Inserir
						</button>
					</li>
					<li class="nav-item active">
						<button type="button" class="btn btn-secondary m-2" data-toggle="modal" data-target="#modal-atualizar">
						 	Atualizar
						</button>
					</li>
					<li class="nav-item active">
						<button type="button" class="btn btn-secondary m-2" data-toggle="modal" data-target="#modal-excluir">
						 	Excluir
						</button>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Lista de letras -->
		<p class="text-center font-weight-bolder m-3">Lista de A a Z</p>
		<hr>
		<div id="lista-de-letras" class="text-center p-2">
			<a href="#">A</a>
			<a href="#">B</a>
			<a href="#">C</a>
			<a href="#">D</a>
			<a href="#">E</a>
			<a href="#">F</a>
			<a href="#">G</a>
			<a href="#">H</a>
			<a href="#">I</a>
			<a href="#">J</a>
			<a href="#">K</a>
			<a href="#">L</a>
			<a href="#">M</a>
			<a href="#">N</a>
			<a href="#">O</a>
			<a href="#">P</a>
			<a href="#">Q</a>
			<a href="#">R</a>
			<a href="#">S</a>
			<a href="#">T</a>
			<a href="#">U</a>
			<a href="#">V</a>
			<a href="#">W</a>
			<a href="#">X</a>
			<a href="#">Y</a>
			<a href="#">Z</a>
		</div>
		<hr>

		<h4 class="text-center p-2 m-4">Docentes efetivos</h4>

		<!-- Tabela -->
		<div class="container">
			<table id="tabela" class="table table-striped">
				<thead>
				<tr id="cabecalho-tabela">
					<th scope="col">Nome</th>
					<th scope="col" class='text-center'>Especialidade</th>
					<th scope="col" class='text-center'>E-mail</th>
					<th scope="col" class='text-center'>Lattes</th>
				</tr>
				</thead>
				<tbody>
					<?php
						try {
							// Conexão com o banco de dados
						    $conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
						    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						    // Prepara uma query para ser executada
						    $consulta = $conn->query("SELECT nome, especialidade, email, lattes FROM professor;");

						    // Percorre todos os registros resultantes da consulta e gera uma linha na tabela
						    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
							    echo "<tr>
										<td>{$linha['nome']}</td>
										<td class='text-center'>{$linha['especialidade']}</td>
										<td class='text-center'>{$linha['email']}</td>
										<td class='text-center'>{$linha['lattes']}</td>
									</tr>";
							}

						// Exibe uma mensagem de erro, caso algo não tenha sido executado corretamente
						} catch(PDOException $e) {
						    echo 'ERROR: ' . $e->getMessage();
						}
				    ?>
				</tbody>
			</table>
		</div>

		<!-- Janela para inserir dados -->
		<div class="modal fade" id="modal-inserir" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Inserir dados</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="php/inserir.php">
						<div class="form-group">
							<label for="nome-input">Nome</label>
							<input name="nome" type="text" class="form-control" id="nome-input" placeholder="Insira o nome" required="required" maxlength="50">
						</div>
						<div class="form-group">
							<label for="especialidade-input">Especialidade</label>
							<input name="especialidade" type="text" class="form-control" id="especialidade-input" placeholder="Insira a especialidade" required="required" maxlength="30">
						</div>
						<div class="form-group">
							<label for="email-input">E-mail</label>
							<input name="email" type="email" class="form-control" id="email-input" placeholder="Ex: exemplo@gmail.com" required="required" maxlength="50">
						</div>
						<div class="form-group">
							<label for="lattes-input">Lattes</label>
							<input name="lattes" type="text" class="form-control" id="lattes-input" placeholder="Insira o link do Lattes" required="required" maxlength="200">
						</div>
						<hr>
						<button type="submit" class="btn btn-info my-3 d-flex mx-auto">Inserir</button>
					</form>
				</div>
				</div>
			</div>
		</div>

		<!-- Janela para atualizar dados -->
		<div class="modal fade" id="modal-atualizar" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Atualizar dados</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="php/atualizar.php">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="radios" id="radio-1" value="nome" checked>
								<label class="form-check-label" for="radio-1">
								Nome
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="radios" id="radio-2" value="especialidade">
								<label class="form-check-label" for="radio-2">
								Especialidade
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="radios" id="radio-3" value="email" checked>
								<label class="form-check-label" for="radio-3">
								E-mail
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="radios" id="radio-4" value="lattes">
								<label class="form-check-label" for="radio-4">
								Lattes
								</label>
							</div>
							<hr>
							<div class="form-group">
								<label for="email-atualizar">E-mail</label>
								<input name="email" type="email" class="form-control" id="email-atualizar" placeholder="Insira o e-mail da linha a ser atualizada" required="required" maxlength="50">
							</div>
							<div class="form-group">
								<label for="campo">Nova informação</label>
								<input name="campo" type="text" class="form-control" id="campo" placeholder="Insira a nova informação" required="required" maxlength="200">
							</div>
							<hr>
							<button type="submit" class="btn btn-info my-3 d-flex mx-auto">Atualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Janela para excluir dados -->
		<div class="modal fade" id="modal-excluir" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Excluir dados</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="php/deletar.php">
							<div class="form-group">
								<label for="email-excluir">E-mail</label>
								<input name="email" type="text" class="form-control" id="email-excluir" placeholder="Insira o e-mail do professor a ser retirado da lista" required="required" maxlength="50">
							</div>
							<hr>
							<button type="submit" class="btn btn-info my-3 d-flex mx-auto">Excluir</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Javascript utilizado no desenvolvimento -->
		<script src="lib/js/jquery.min.js"></script>
		<script src="lib/js/bootstrap.bundle.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>