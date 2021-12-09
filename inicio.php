
<html>
<h1>
    bem vindo <?php
session_start();
include_once("conexao.php");
if (isset($_SESSION['nome'])) {
$_SESSION['msg'] = "area restrita";
	header("Location: login.php");
}
echo $_SESSION['nome'];
?> a pagina inicial de um sitema<p>
    <a href="sair.php">sair</a>
</h1>


</html>