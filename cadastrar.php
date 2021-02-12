<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Controle de estoque - Cadastrar produto</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" href="./style.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>

	<body>

		<script src="ajax.js"></script>
				<div class="cadastro" id="cadastro">
					<a href="index.php">Voltar para a página principal</a>
					<form id="fcadastro">
						<label for="descprod">Descrição do produto</label>
						<br>
						<input type="text" name="descprod" id="descprod" id="descprod">
						<br>

						<label for="vlrunit">Valor unitário</label>
						<br>
						<input type="number" name="vlrunit" id="vlrunit" min="0" step="0.01" id="vlrunit">
						<br>

						<label for="barcode">Código de barras</label>
						<br>
						<input class="large-id" type="number" name="barcode" min="0" max="999999999999" id="barcode">
						<br>

						<label for="ref">Referência da fábrica</label>
						<br>
						<input type="text" name="ref" id="ref">
						<br>

						<label for="marca">Marca</label>
						<br>
						<input type="text" name="marca" id="marca">
						<br>

						<label for="gen">Gênero</label>
						<br>
						<input type="text" name="gen" id="gen">
						<br>

						<label for="subgen">Sub-gênero</label>
						<br>
						<input type="text" name="subgen" id="subgen">
						<br>

						<input type="submit" value="Cadastrar" id="btncadastrar" onclick="CadastrarUsuario();">
					</form>
				</div>
	</body>
	
	<?php

	include 'connectdb.php';
	
	$result = mysqli_query($link,"select * from estoquev1.produtos");
	if($result === FALSE) { 
    	die(mysqli_error($link)); // TODO: better error handling
	}

	$dsc = $_GET["descprod"];
	$vlr = $_GET["vlrunit"];
	$bcd = $_GET["barcode"];
	$ref = $_GET["ref"];
	$mar = $_GET["marca"];
	$gen = $_GET["gen"];
	$sub = $_GET["subgen"];

	$stmt = $link->prepare("INSERT INTO produtos (descprod, vlrunit, barcode, ref, marca, gen, subgen)VALUES (?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssss",$dsc,$vlr,$bcd,$ref,$mar,$gen,$sub);
	$stmt->execute();

	include 'entradasnovas.php';
	include 'updateids.php';

	$stmt->close();

	?>

<footer>
			<script src="jquery.js"></script>
			<script type="text/javascript" src="dadospracadastro.js"></script>
</html>