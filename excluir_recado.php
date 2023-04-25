<?php
// verificar se o recado está logado
session_start();


// conectar-se ao banco de dados
include("config.php");

// verificar se o recado confirmou a exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST["confirmacao"] == "sim") {
		// excluir o recado do banco de dados
		$id = $_POST['id'];
		$sql = "DELETE FROM tbrecado WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
			header("Location: portal.php");
		} else {
			echo "Erro ao excluir recado: " . mysqli_error($conn);
		}
		header("Location: portal.php");
		exit();
	}
}
// exibir a mensagem de confirmação
?>

<!DOCTYPE html>
<html>
<head>
	<title>Excluir cadastro</title>
	<link rel="stylesheet" href="./excluir_usuario.css">
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h1>Excluir Recado</h1>
	<p>Tem certeza que deseja excluir seu recado?</p>
		<input type="radio" name="confirmacao" value="sim">Sim<br>
		<input type="radio" name="confirmacao" value="nao" checked>Não<br>
		<br>
		<input type="hidden" name="id" id= "id"   value="<?php echo $_GET['id']; ?>">
		<input class="botao" type="submit" name="submit" value="Excluir">
		<br><br>
		<button class="botao"><a  href="./portal.php" >Voltar</a></button>
	</form>
</body>
</html>