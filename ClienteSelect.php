<!DOCTYPE HTML>
<HTML>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <title>APP ACADEMIA</title>
</head>

<body>

  <div class="boxMain">

    <div class="boxMenu">
      <nav class="dp-menu">
        <li><a href="index.html">INÍCIO</a></li>
      </nav>
      <nav>
        <li><a href="ClienteFormularioInserir.html">CADASTRAR NOVO CLIENTE</a></li>
      </nav>
    </div>

    <div class="boxTitulo">
      <h1>CLIENTES CADASTRADOS</h1>
    </div>

    <table>
      <tr>
        <td><b>Código</b></td>
        <td><b>Nome</b></td>
        <td><b>Data de Nascimento</b></td>
        <td><b>Email</b></td>
        <td><b>Telefone</b></td>
        <td><b>Editar</b></td>
        <td><b>Excluir</b></td>
      </tr>

      <?php
      include_once("_conexao.php");

      $conn = conectaBD();
      $select = "SELECT * FROM Clientes";
      $resultado = mysqli_query($conn, $select);


      while ($i = mysqli_fetch_assoc($resultado)) {
      ?>

      <tr>
        <td>
          <?php echo $i['codCliente']; ?>
        </td>
        <td>
          <?php echo $i['nome']; ?>
        </td>
        <td>
          <?php $data = $i['dataNascimento'];
        $dataP = explode('-', $data);
        $dataParaExibir = $dataP[2] . '/' . $dataP[1] . '/' . $dataP[0];
        echo $dataParaExibir; ?>
        </td>
        <td>
          <?php echo $i['email']; ?>
        </td>
        <td>
          <?php echo $i['telefone']; ?>
        </td>
        <td><a href="<?php echo "ClienteFormularioEditar.php?var_codCliente=" . $i['codCliente'] . "&var_nome=" . $i['nome'] . "&var_dataNascimento=" . $i['dataNascimento'] .
          "&var_email=" . $i['email'] . "&var_telefone=" . $i['telefone'] ?>"> Alterar </a></td>
        <td><a href="<?php echo "_delete.php?var_cod=" . $i['codCliente'] . "&tabela=clientes" ?>"> Excluir </a></td>
      </tr>
      <?php
      }
      ?>

    </table>
  </div>  
</body>

</HTML>