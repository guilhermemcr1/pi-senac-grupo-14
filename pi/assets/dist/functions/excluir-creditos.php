<?php

require_once 'funcoes.php';

$conexao = criarConexao();

$id_credito = $_GET['id_credito'];
$sql = "DELETE FROM credito
WHERE id_credito=$id_credito";

$gravado = mysqli_query($conexao, $sql);

if ($gravado == true) {
    header("location: ../../../view/index-credito.php");
} else {
    echo"erro ao gravar usuario!<br>";
    echo $sql;
    echo mysqli_error($conexao);
    die();
}
mysqli_close($conexao);