<?php
include_once("_conexao.php");

if ($_POST["tabela"] == 'clientes') {
    cadastraClientes($_POST["input_nome"], $_POST["input_dataNascimento"], $_POST["input_email"], $_POST["input_telefone"]);
    header("Location:ClienteSelect.php");
}

if ($_POST["tabela"] == 'funcionarios') {
    cadastraFuncionarios($_POST["input_nome"], $_POST["input_dataNascimento"], $_POST["input_email"], $_POST["input_telefone"], $_POST["input_salario"]);
    header("Location:FuncionarioSelect.php");
}

if ($_POST["tabela"] == 'servicos') {
    cadastraServicos($_POST["input_nome"], $_POST["input_mensalidade"], $_POST["select_cliente"], $_POST["select_funcionario"]);
    header("Location:ServicoSelect.php");
}


function cadastraClientes($nome, $data, $email, $telefone)
{
    $conexao = conectaBD();

    $dados = "INSERT INTO Clientes(nome, dataNascimento, email, telefone) VALUES ('{$nome}','{$data}','{$email}','{$telefone}')";
    
    mysqli_query($conexao, $dados) or die(mysqli_error());
    echo "Cadastro com Sucesso!";
    desconectaBD($conexao);
}

function cadastraFuncionarios($nome, $data, $email, $telefone, $salario)
{
    $conexao = conectaBD();

    $dados = "INSERT INTO Funcionarios(nome, dataNascimento, email, telefone, salario) VALUES ('{$nome}','{$data}','{$email}','{$telefone}','{$salario}')";

    mysqli_query($conexao, $dados) or die(mysqli_error());
    echo "Cadastro com Sucesso!";
    desconectaBD($conexao);
}

function cadastraServicos($nome, $mensalidade, $codCliente, $codFuncionario)
{
    $conexao = conectaBD();

    $dados = "INSERT INTO Servicos(Nome, Mensalidade, codCliente, codFuncionario) VALUES ('{$nome}','{$mensalidade}','{$codCliente}',{$codFuncionario})";

    mysqli_query($conexao, $dados) or die(mysqli_error());
    echo "Cadastro com Sucesso!";
    desconectaBD($conexao);
}
?>