<?php
$conexao = mysqli_connect('localhost', 'radius', '');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = mysqli_query($conexao, "DELETE FROM radreply WHERE id = '".$id."'");

header("Location: ../listaipv6.php");
?>