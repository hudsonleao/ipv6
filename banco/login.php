<?php
$conexao = mysqli_connect('localhost', 'radius', '');
$banco = mysqli_select_db($conexao, 'radius');

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
 
if (empty($usuario) || empty($senha))
{
    header('Location: ../index.php?embranco');
    exit;
}
$sql = mysqli_query($conexao, "select encode('".$senha."', 'password')");
$dados = mysqli_fetch_assoc($sql);
foreach ($dados as $senhaCripto){
    $sql = mysqli_query($conexao, "SELECT id FROM usuarios WHERE nome = '".$usuario."' AND senha = '".$senhaCripto."'");
    $users = mysqli_fetch_assoc($sql);
    
}
if (count($users) <= 0)
{
    header('Location: ../index.php?incorreto');
    exit;
}
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nome'];

header('Location: ../listaipv6.php');

?>

