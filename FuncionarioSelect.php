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
            <li><a href="FuncionarioFormularioInserir.html">CADASTRAR NOVO FUNCIONÁRIO</a></li>
         </nav>
      </div>

      <div class="boxTitulo">
         <h1>FUNCIONÁRIOS CADASTRADOS</h1>
      </div>

      <table>
         <tr>
            <td><b>Código</b></td>
            <td><b>Nome</b></td>
            <td><b>Data de Nascimento</b></td>
            <td><b>Email</b></td>
            <td><b>Telefone</b></td>
            <td><b>Salário</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
         </tr>

         <?php
         include_once("_conexao.php");

         $conn = conectaBD();

         $select = "SELECT * FROM funcionarios";
         
         $resultado = mysqli_query($conn, $select);

         while ($i = mysqli_fetch_assoc($resultado)) {
         ?>
         <tr>
            <td>
               <?php echo $i['codFuncionario']; ?>
            </td>
            <td>
               <?php echo $i['nome']; ?>
            </td>
            <td>
               <?php $data = $i['dataNascimento'];
            $dataP = explode('-', $data);
            $dataParaExibir = $dataP[2] . '/' . $dataP[1] . '/' . $dataP[0];
            echo $dataParaExibir;
               ?>
            </td>
            <td>
               <?php echo $i['email']; ?>
            </td>
            <td>
               <?php echo $i['telefone']; ?>
            </td>
            <td>
               <?php echo "R$" . $i['salario']; ?>
            </td>
            <td><a
                  href="<?php echo "FuncionarioFormularioEditar.php?var_codFuncionario=" . $i['codFuncionario'] . "&var_nome=" . $i['nome'] . "&var_dataNascimento=" .
               $i['dataNascimento'] . "&var_email=" . $i['email'] . "&var_telefone=" . $i['telefone'] . "&var_salario=" . $i['salario'] ?>">Alterar
               </a></td>
            <td><a
                  href="<?php echo "_delete.php?var_cod=" . $i['codFuncionario'] . "&tabela=funcionarios" ?>">Excluir</a>
            </td>
         </tr>

         <?php
         }
         ?>

      </table>
   </div>
</BODY>

</HTML>