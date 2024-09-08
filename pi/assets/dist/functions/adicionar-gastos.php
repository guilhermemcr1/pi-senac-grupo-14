<?php

require_once 'funcoes.php';

$conexao = criarConexao();

$titulo = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$categoria = $_POST['categoria'];


$sql = "insert into despesas(titulo,data,valor,categoria) values
         ('$titulo','$data','$valor','$categoria')";

$gravado = mysqli_query($conexao, $sql);


if ($gravado == true) {
    echo"<script language='javascript' type='text/javascript'>
        alert('Produto cadastrado com sucesso!');window.location
        .href='../../../view/index-gastos.php';</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>
        alert('Verifique os dados digitados!');window.location
        .href='../../../view/cadastrar-gastos.php';</script>";
    die();
}
mysqli_close($conexao);