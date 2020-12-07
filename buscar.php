<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Controle de estoque - Buscar produto</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" href="./style.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>

	<body>

		<script src="ajax.js"></script>
				<div class="container" id="container">
					<div class="busca" id="busca">
						<a href="index.php">Voltar para a página principal</a>
						<br>
						<form>
							<label for="codigo">Código</label>
							<br>
							<input class="large-id" type="number" name="codigo" id="codigo" min="0" max="999999">
							<br>

							<label for="descprod">Descrição do produto</label>
							<br>
							<input type="text" name="descprod" id="descprod">
							<br>

							<!--<label for="barcode">Código de barras</label>
							<br>
							<input class="large-id" type="number" name="barcode" min="0" max="999999999999">
							<br>

							<label for="ref">Referência da fábrica</label>
							<br>
							<input type="text" name="ref">
							<br>

							<label for="marca">Marca</label>
							<br>
							<input class="id" type="number" name="idmarca" min="0" max="999">
							<input type="text" name="marca">
							<br>

							<label for="gen">Gênero</label>
							<br>
							<input class="id" type="number" name="idgen" min="0" max="999">
							<input type="text" name="gen">
							<br>

							<label for="subgen">Sub-gênero</label>
							<br>
							<input class="id" type="number" name="idsubgen" min="0" max="999">
							<input type="text" name="subgen">
							<br>-->

							<input type="button" value="Buscar" id="btnbuscar" onclick="GetDados();">
						</form>
					</div>
				</div>
				<div id="res">Resultados da busca: </div>
	</body>
	
	<?php

	include 'connectdb.php';
	include 'consulta.php';
	
	$result = mysqli_query($con,"select * from estoquev1.produtos");
	if($result === FALSE) { 
    	die(mysqli_error()); // TODO: better error handling
	}

	?>

<footer>
			<script src="jquery.js"></script>
</html>