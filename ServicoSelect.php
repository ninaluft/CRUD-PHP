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
            <li><a href="ServicoFormularioInserir.php">CADASTRAR NOVO SERVIÇO</a></li>
         </nav>
      </div>

      <div class="boxTitulo">
         <h1>SERVIÇOS CADASTRADOS</h1>
      </div>

      <div class="boxSelect">

         <table>
            <tr>
               <td><b>Código</b></td>
               <td><b>Nome</b></td>
               <td><b>Mensalidade</b></td>
               <td><b>Cliente</b></td>
               <td><b>Funcionário Responsável</b></td>
               <td><b>Editar</b></td>
               <td><b>Excluir</b></td>
            </tr>

            <?php
            $get1 = filter_input(INPUT_GET, "var_codCliente");

            include_once("_conexao.php");

            $conn = conectaBD();

            $select = "SELECT s.codServico, s.nome as serv, s.mensalidade, c.nome, f.nome as fun
            FROM clientes c inner join servicos s on c.codCliente = s.codCliente 
            inner join funcionarios f ON s.codFuncionario = f.codFuncionario";

            $resultado = mysqli_query($conn, $select);

            while ($i = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
               <td>
                  <?php echo $i['codServico']; ?>
               </td>
               <td>
                  <?php echo $i['serv']; ?>
               </td>
               <td>
                  <?php echo $i['mensalidade']; ?>
               </td>
               <td>
                  <?php echo $i['nome']; ?>
               </td>
               <td>
                  <?php echo $i['fun']; ?>
               </td>

               <td><a href="<?php echo "ServicoFormularioEditar.php?var_codServico=" . $i['codServico'] . "&var_nome=" . $i['serv'] . "&var_mensalidade=" .
                  $i['mensalidade'] . "&var_codCliente=" . $i['nome'] . "&var_codFuncionario=" . $i['fun'] ?>">
                     Alterar </a></td>
               <td><a href="<?php echo "_delete.php?var_cod=" . $i['codServico'] . "&tabela=servicos" ?>"> Excluir</a>
               </td>

            </tr>
            <?php
            }
            ?>
         </table>
      </div>
   </div>

</BODY>

</HTML>