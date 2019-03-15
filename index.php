<!DOCTYPE html>
<?php
$conexao = mysqli_connect('localhost', 'radius', 'r4d1us');
$banco = mysqli_select_db($conexao, 'radius');
mysqli_set_charset($conexao, 'utf8');

$sql = mysqli_query($conexao, "select * FROM usuarios") or die("Erro");
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IPV6</title>
    <link href="assets/css/bootstrap_login.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/styleLogin.css" rel="stylesheet" type="text/css"/>
    <script src="assets/js/bootstrap.min_login.js" type="text/javascript"></script>
    <script src="assets/js/jquery3.2.1.js" type="text/javascript"></script>
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">

      <div class="fadeIn first"><br>
      <h1>Bem-vindo!</h1>
      <h2>Faça seu login</h2><br>
    </div>
      <form action="banco/login.php" method="post">
     <div class="container d-flex justify-content-center">
     <div class="form-group">
     <div class="col-12">
    <label for="usuario">Usuário:</label>
    <select class="custom-select my-1 mr-sm-2 fadeIn second form-control"  name="usuario" id="usuario">
    <option selected>Selecione um usuário</option>
    <?php while ($dados = mysqli_fetch_assoc($sql)) {?>
    <option value="<?= $dados['nome'] ?>"><?= $dados['nome'] ?></option>
    <?php } ?>
  </select>
  <div class="form-group">
    <label for="pwd">Senha:</label>
    <input type="password" required name="senha" placeholder="Digite sua senha" class="form-control" id="pwd">
  </div>
  </div>
  </div>

    </div><br>
      <input type="submit" class="fadeIn fourth" value="Acessar">
    </form>
      <?php if (isset($_GET['embranco']) && empty($_GET['embranco'])) {
          echo '<font color="#FF0033">Digite o usuário e senha</font> ';
      }  
      if (isset($_GET['incorreto']) && empty($_GET['incorreto'])) {
      echo '<font color="#FF0033">Usuário ou senha incorreto</font>';
  }
      ?>

    <div id="formFooter">
      <a class="underlineHover" href="http://www.lionit.com.br">Ir para o site</a>
    </div>

  </div>
</div>
</body>
</html>
