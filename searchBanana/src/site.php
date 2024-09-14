<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recebimento</title>
</head>
<body>
	<p>
	<?php
		if (empty($_POST['nome']) || empty($_POST['idade'])) {
			echo "Você não tem permissão para acessar o site!";
		} else {
			$nome 		= $_POST['nome'];
			$idade 		= $_POST['idade'];

			echo "<p>Olá, $nome!<br>";

			if ($idade >= 18) {
				echo "Você tem $idade anos de idade, seja bem vindo ao nosso site!";
			} else {
				echo "Você tem $idade anos de idade, por isso não tem permissão para acessar o site!";
			}
		}
	?>
	</p>
</body>
</html>