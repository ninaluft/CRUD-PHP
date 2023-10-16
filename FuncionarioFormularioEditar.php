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
            <li><a href="FuncionarioSelect.php">FUNCIONÁRIOS CADASTRADOS</a></li>
         </nav>
      </div>

      <div class="boxTitulo">
         <h1>EDITAR FUNCIONÁRIO</h1>
      </div>

      <?php
      $get1 = filter_input(INPUT_GET, "var_codFuncionario");
      $get2 = filter_input(INPUT_GET, "var_nome");
      $get3 = filter_input(INPUT_GET, "var_dataNascimento");
      $get4 = filter_input(INPUT_GET, "var_email");
      $get5 = filter_input(INPUT_GET, "var_telefone");
      $get6 = filter_input(INPUT_GET, "var_salario");
      ?>


      <div class="boxEdit">


         <form action="_update.php" method="post">

            <input type=hidden name=tabela value="funcionarios">

            <b> Código:</b> <input type="text" name="input_cod" size="8" value="<?php echo $get1 ?>" readonly>
            </br></br>

            <b> Nome:</b> <input type="text" name="input_nome" size="30" value="<?php echo $get2 ?>" required>
            </br></br>

            <b> Data Nascimento:</b> <input type="date" name="input_dataNascimento" size="8"
               value="<?php echo $get3 ?>" required>
            </br></br>

            <b> Email:</b> <input type="text" name="input_email" size="30" value="<?php echo $get4 ?>"required>
            </br></br>

            <b> Telefone:</b> <input type="text" name="input_telefone" size="8" value="<?php echo $get5 ?>"required>
            </br></br>

            <b> Salário:</b> <input type="text" name="input_salario" size="8" value="<?php echo $get6 ?>"required>
            </br></br>

            <input class="botao" type="submit" value="Salvar">

         </form>

      </div>
   </div>

</BODY>

</HTML>