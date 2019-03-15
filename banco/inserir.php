<?php
$conexao = mysqli_connect('localhost', 'radius', '');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$username = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$value = isset($_POST['prefixo']) ? $_POST['prefixo'] : '';

$sql = mysqli_query($conexao, "SELECT * FROM radreply WHERE value = '".$value."'");
$ipv6 = mysqli_fetch_assoc($sql);
if (count($ipv6) != 0){
    header('Location: ../adicionar.php?ipduplicado');
    exit;
}
$sql = mysqli_query($conexao, "SELECT * FROM radreply WHERE username = '".$username."'");
$usuarioduplo = mysqli_fetch_assoc($sql);
if (count($usuarioduplo) != 0){
    header('Location: ../adicionar.php?userduplo');
    exit;
}
else {
    $sql = mysqli_query($conexao, "INSERT INTO `radreply` (`id`, `username`, `attribute`, `op`, `value`) VALUES (NULL, '".$username."', 'Mikrotik-Delegated-IPv6-Pool', ':=', '".$value."')");
    header('Location: ../listaipv6.php?salvoadd');
}

?>