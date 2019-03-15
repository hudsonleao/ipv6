<?php
$conexao = mysqli_connect('localhost', 'radius', '');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$sql = mysqli_query($conexao, "select encode('".$senha."', 'password')");
$dados = mysqli_fetch_assoc($sql);
foreach ($dados as $senhaCripto){
    $sql = mysqli_query($conexao, "INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES (null, '".$usuario."', '".$senhaCripto."')");
    header("Location: ../listaipv6.php?salvo");
}
?>