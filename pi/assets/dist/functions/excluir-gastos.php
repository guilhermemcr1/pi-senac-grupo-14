<?php

require_once 'funcoes.php';

$conexao = criarConexao();

$id_despesas = $_GET['id_despesas'];
$sql = "DELETE FROM despesas
WHERE id_despesas=$id_despesas";

$gravado = mysqli_query($conexao, $sql);

if ($gravado == true) {
    header("location: ../../../view/index-gastos.php");
} else {
    echo"erro ao gravar usuario!<br>";
    echo $sql;
    echo mysqli_error($conexao);
    die();
}
mysqli_close($conexao);