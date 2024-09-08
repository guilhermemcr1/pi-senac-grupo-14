<?php

require_once 'funcoes.php';

$conexao = criarConexao();


$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$data_nascimento = $_POST['datanasc'];
$senha = md5($_POST['senha']);
$senharepete = md5($_POST['repetesenha']);


if($senha != $senharepete){
    echo"<script language='javascript' type='text/javascript'>
    alert('Senhas diferentes, verifique o conteúdo preenchido!');window.location
    .href='../../../view/cadastro.html';</script>";
    die();
}

$sql_verifica = "select cpf from usuario where cpf =$cpf";
$sql_verifica_email = "select email from usuario where email ='$email'";

$verifica_usuario = mysqli_query($conexao, $sql_verifica);
$verifica_usuario= mysqli_num_rows($verifica_usuario); 

$verifica_usuario_email = mysqli_query($conexao, $sql_verifica_email);
$verifica_usuario_email= mysqli_num_rows($verifica_usuario_email); 



if($verifica_usuario_email != 0){
    echo"<script language='javascript' type='text/javascript'>
    alert('Email já registrado!');window.location
    .href='../../../view/cadastro.html';</script>";
    die();

}elseif($verifica_usuario != 0){
    echo"<script language='javascript' type='text/javascript'>
    alert('CPF já registrado!');window.location
    .href='../../../view/cadastro.html';</script>";
    die();

}else{

    $sql = "insert into usuario(nome,senha,data_nascimento,cpf,email) values
         ('$nome','$senha','$data_nascimento','$cpf','$email')";
}

$gravado = mysqli_query($conexao, $sql);

if ($gravado == true) {
    echo"<script language='javascript' type='text/javascript'>
    alert('Cadastro efetuado com sucesso, redirecionando para o Login!');window.location
    .href='../../../view/login.html';</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>
        alert('Verifique os dados digitados!');window.location
        .href='../../../view/cadastro.html';</script>";
    die();
}
mysqli_close($conexao);