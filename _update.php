<?php
include_once("_conexao.php");

if ($_POST["tabela"] == 'clientes') {
       editaCliente($_POST["input_cod"], $_POST["input_nome"], $_POST["input_dataNascimento"], $_POST["input_email"], $_POST["input_telefone"]);
       header("Location:ClienteSelect.php");
}

if ($_POST["tabela"] == 'funcionarios') {
       editaFuncionario($_POST["input_cod"], $_POST["input_nome"], $_POST["input_dataNascimento"], $_POST["input_email"], $_POST["input_telefone"], $_POST["input_salario"]);
       header("Location:FuncionarioSelect.php");
}

if ($_POST["tabela"] == 'servicos') {
       editaServico($_POST["input_cod"], $_POST["input_nome"], $_POST["input_mensalidade"], $_POST["select_cliente"], $_POST["select_funcionario"]);
       header("Location:ServicoSelect.php");
}


function editaCliente($p1, $p2, $p3, $p4, $p5)
{
       $conexao = conectaBD();

       $dados = "UPDATE  Clientes 
            SET    nome = '{$p2}', 
                   dataNascimento = '{$p3}', 
                   email = '{$p4}',
                   telefone = '{$p5}'
            WHERE  codCliente = '{$p1}'";

       echo $dados;

       mysqli_query($conexao, $dados) or die(mysqli_error());
       echo "Editado com Sucesso!";
       desconectaBD($conexao);
}


function editaFuncionario($p1, $p2, $p3, $p4, $p5, $p6)
{
       $conexao = conectaBD();

       $dados = "UPDATE  Funcionarios 
            SET    nome = '{$p2}', 
                   dataNascimento = '{$p3}', 
                   email = '{$p4}',
                   telefone = '{$p5}',
                   salario = '{$p6}'
            WHERE  codFuncionario = '{$p1}'";

       echo $dados;

       mysqli_query($conexao, $dados) or die(mysqli_error());
       echo "Editado com Sucesso!";
       desconectaBD($conexao);
}


function editaServico($p1, $p2, $p3, $p4, $p5)
{
       $conexao = conectaBD();

       $dados = "UPDATE  Servicos
             SET    nome = '{$p2}', 
                    mensalidade = '{$p3}',
                    codCliente = '{$p4}',
                    codFuncionario = '{$p5}'
             WHERE  codServico = '{$p1}'";

       echo $dados;

       mysqli_query($conexao, $dados) or die(mysqli_error());
       echo "Editado com Sucesso!";
       desconectaBD($conexao);
}

?>