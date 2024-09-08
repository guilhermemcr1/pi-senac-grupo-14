<?php

function criarConexao() {

    $conexao = mysqli_connect('localhost','root','87654321','pi-db');
    return $conexao;
}

function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}

