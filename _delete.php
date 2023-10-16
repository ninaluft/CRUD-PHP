<?php
include_once("_conexao.php");

$get1 = (string) filter_input(INPUT_GET, "tabela");
$get2 = filter_input(INPUT_GET, "var_cod");

if ($get1 == 'clientes') {
   excluirCliente($get2);
   header("Location:ClienteSelect.php");
}

if ($get1 == 'funcionarios') {
   excluirFuncionario($get2);
   header("Location:FuncionarioSelect.php");
}

if ($get1 == 'servicos') {
   excluirServico($get2);
   header("Location:ServicoSelect.php");
}

// ---------------------------------
function excluirCliente($p1)
{
   $conexao = conectaBD();

   $dados = "DELETE FROM Clientes
            WHERE  CodCliente = '{$p1}'";

   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";
   desconectaBD($conexao);
}

function excluirFuncionario($p1)
{
   $conexao = conectaBD();

   $dados = "DELETE FROM Funcionarios 
            WHERE  CodFuncionario = '{$p1}'";

   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";
   desconectaBD($conexao);
}

function excluirServico($p1)
{
   $conexao = conectaBD();

   $dados = "DELETE FROM Servicos 
             WHERE  CodServico = '{$p1}'";

   mysqli_query($conexao, $dados) or die(mysqli_error());

   echo "Excluído com Sucesso!";
   desconectaBD($conexao);
}

?>