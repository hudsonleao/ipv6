<?php
$conexao = mysqli_connect('localhost', 'radius', '');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$id = isset($_POST['id']) ? $_POST['id'] : '';
$username = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$value = isset($_POST['prefixo']) ? $_POST['prefixo'] : '';

$sql = mysqli_query($conexao, "UPDATE radreply SET username = '".$username."', value = '".$value."' WHERE radreply.id = '".$id."'");

header("Location: ../listaipv6.php?editsalvo");
?>