<!DOCTYPE HTML>
<HTML>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <title>APP ACADEMIA</title>
</head>

<BODY>

  <div class="boxMain">

    <div class="boxMenu">
      <nav>
        <li><a href="index.html">INÍCIO</a></li>
      </nav>
      <nav>
        <li><a href="ServicoSelect.php">SERVIÇOS CADASTRADOS</a></li>
      </nav>
    </div>

    <div class="boxTitulo">
      <h1>CADASTRO DE SERVIÇOS</h1>
    </div>

    <div class="boxEdit">
      <form action="_insert.php" method="post">

        <input type=hidden name=tabela value="servicos">

        <b> Nome:</b> <input type="text" name="input_nome" size="30" required>
        </br></br>

        <b> Valor da mensalidade:</b> <input type="text" name="input_mensalidade" size="12" required>
        </br></br>

        <b> Cliente:</b>
        <select name="select_cliente" required>
          <option value="">Selecione</option>
          <?php
          include_once("_conexao.php");

          $conn = conectaBD();

          $select = "SELECT codCliente, Nome FROM Clientes order by nome";
          $resultado = mysqli_query($conn, $select);

          while ($i = mysqli_fetch_assoc($resultado)) {
          ?>
          <option value="<?php echo $i['codCliente']; ?>">
            <?php echo $i['Nome']; ?>
          </option>

          <?php
          }
          ?>
        </select>
        <br></br>

        <b>Funcionário:</b>
        <select name="select_funcionario" required>
          <option value="">Selecione</option>
          <?php
          include_once("_conexao.php");

          $conn = conectaBD();

          $select = "SELECT codFuncionario, Nome FROM Funcionarios order by nome";
          $resultado = mysqli_query($conn, $select);

          while ($i = mysqli_fetch_assoc($resultado)) {
          ?>
          <option value="<?php echo $i['codFuncionario']; ?>">
            <?php echo $i['Nome']; ?>
          </option>

          <?php
          }
          ?>
        </select>

        <br></br>
        </br></br>

        <input class="botao" type="reset" value="Reset"> <input class="bootao" type="submit" value="Cadastrar">

      </form>

    </div>
  </div>

</BODY>

</HTML>