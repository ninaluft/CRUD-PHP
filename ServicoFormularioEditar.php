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
         <nav class="dp-menu">
            <li><a href="index.html">INÍCIO</a></li>
         </nav>
         <nav>
            <li><a href="ServicoSelect.php">SERVIÇOS CADASTRADOS</a></li>
         </nav>
      </div>

      <div class="boxTitulo">
         <h1>EDITAR SERVIÇO</h1>
      </div>

      <?php
      $get1 = filter_input(INPUT_GET, "var_codServico");
      $get2 = filter_input(INPUT_GET, "var_nome");
      $get3 = filter_input(INPUT_GET, "var_mensalidade");
      $get4 = filter_input(INPUT_GET, "var_codCliente");
      $get5 = filter_input(INPUT_GET, "var_codFuncionario");

      ?>

      <div class="boxEdit">


         <form action="_update.php" method="post">

            <input type=hidden name=tabela value="servicos">

            <b> Código:</b> <input type="text" name="input_cod" size="8" value="<?php echo $get1 ?>" readonly>
            </br></br>

            <b> Nome:</b> <input type="text" name="input_nome" size="30" value="<?php echo $get2 ?>"required>
            </br></br>

            <b> Mensalidade:</b> <input type="text" name="input_mensalidade" size="8" value="<?php echo $get3 ?>"required>
            </br></br>

            <b> Cliente:</b>
            <select name="select_cliente" required>
               <option value=""> Selecione </option>
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
            </br></br>

            <b>Funcionário:</b>
            <select name="select_funcionario"required>
               <option value="">Selecione </option>
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
            </br></br>

            <input class="botao"s type="submit" value="Salvar">

         </form>

      </div>
   </div>
</BODY>

</HTML>