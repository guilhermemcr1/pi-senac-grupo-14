<?php

require 'funcoes.php';

$conexao = criarConexao();

$email = $_POST['email'];
$senha = md5 ($_POST['senha']);
$logar = $_POST['logar'];



    if (isset($logar)) {

        $verificaEmail = "SELECT * FROM usuario WHERE email = '$email'";
        $resultadoEmail = mysqli_query($conexao, $verificaEmail);
        $verificaSenha = "SELECT * FROM usuario WHERE senha = '$senha'";
        $resultadoSenha = mysqli_query($conexao, $verificaSenha);
    

        if (mysqli_num_rows($resultadoEmail) <= 0) {
            echo"<script language='javascript' type='text/javascript'>
            alert('Email não cadastrado');window.location
            .href='../../../view/login.html';</script>";
            die();
        } elseif(mysqli_num_rows($resultadoSenha) <= 0) {
                echo"<script language='javascript' type='text/javascript'>
                alert('Senha não confere!');window.location
                .href='../../../view/login.html';</script>";
                die();
        }else {
    
            $nomeusuario = "SELECT id_usuario FROM usuario WHERE email = '$email'";
            $nomeDb = mysqli_query($conexao, $nomeusuario);
            $idUser = mysqli_fetch_all($nomeDb, MYSQLI_ASSOC);
            foreach ($idUser as $id_usuario) {
            $idUser = $id_usuario['id_usuario'];
            }
    
   
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['id_usuario'] = $id_usuario;

    
            header("Location:../../../view/inicio.php");
        }
    }
    mysqli_close($conexao);


?>