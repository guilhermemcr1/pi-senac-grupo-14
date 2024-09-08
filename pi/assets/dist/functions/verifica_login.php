<?php
 
require_once 'funcoes.php';
 
if (!isLoggedIn())
{
    header('Location:../view/login.html');
}