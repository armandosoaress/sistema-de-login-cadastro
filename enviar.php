

<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senhacr = password_hash($senha, PASSWORD_DEFAULT);

$consulta = "SELECT * FROM `usuarios`";
$resultado = $conn->query($consulta) or die($conn->error);
//enquando se dado for igual resultado jogar lista, faça-se a seguência do código abaixo

$encontrou=0;
while($dado = $resultado->fetch_array()){
       echo $dado["usuario"];
       echo "-----";
          echo $usuarios;

$usuarios=  $dado["usuario"];
if ($usuarios==$usuario) {
 
    $encontrou=1;
    
}
}
echo $encontrou;
if($encontrou==0){
    $consulta = "INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES (NULL, '$nome', '$usuario', '$senhacr');";
 $resultado = $conn->query($consulta) or die($conn->error);
 $_SESSION['msg'] = "usuario cadastrado!!";
 header("Location: login/login.php");
}else{
    	$_SESSION['msg'] = "usuario já existe!!";
	header("Location:login/login.php");
}
