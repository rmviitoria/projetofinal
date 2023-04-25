<?php
// verificar se o usuário está logado
session_start();

if (!isset($_SESSION["id"])) {
	header("Location: editar.php");
	exit();
}

// exibir as informações do usuário logado
$id = $_SESSION["id"];
$recado = $_SESSION["recado"];
$data = $_SESSION["data"];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./perfil.css"> 
	<title>Perfil</title>
</head>
<body>
	<form>
		<br>
	<h1>Seu recado</h1>
	<p>ID: <?php echo $id; ?></p>
	<p>Recado: <?php echo $recado; ?></p>
	<p>Data: <?php echo $data; ?></p>
	<p><a href="editar_recado.php">Editar cadastro</a></p>
	<p><a href="excluir_recado.php">Excluir cadastro</a></p>
	</form>
</body>
</html>