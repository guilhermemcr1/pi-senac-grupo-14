<?php
session_start();


require_once '../assets/dist/functions/funcoes.php';
require '../assets/dist/functions/verifica_login.php';


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Finai | Adicionar Gastos</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/dist/css/home.css" />
    <link rel="stylesheet" href="../assets/dist/css/cadastrar-gastos.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />

    <!-- Booststrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    
</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
          <ul>
            <li>
              <a href="inicio.php">
                <span class="logo">
                  <img src="../assets/dist/img/logofinAI.png" alt=" Logo">
                </span>
                <span class="title"></span>
              </a>
            </li>
  
            <li>
              <a href="inicio.php">
                <span class="icon">
                 <i class="bi bi-house"></i>
                </span>
                <span class="title">Início</span>
              </a>
            </li>
  
            <li>
              <a href="index-gastos.php">
                <span class="icon">
                 <i class="bi bi-activity"></i>
                </span>
                <span class="title">Despesas</span>
              </a>
            </li>
  
            <li>
              <a href="index-credito.php">
                <span class="icon">
                 <i class="bi bi-clipboard-data"></i>
                </span>
                <span class="title">Créditos</span>
              </a>
            </li>
  
            <li>
              <a href="extrato.php">
                <span class="icon">
                  <i class="bi bi-graph-up"></i>
                </span>
                <span class="title">Extrato</span>
              </a>
            </li>
  
            <li>
              <a href="ai-financeira.php">
                <span class="icon">
                  <i class="bi bi-coin"></i>
                </span>
                <span class="title">AI Financeira</span>
              </a>
            </li>
  
            <li>
              <a href="#">
                <span class="icon">
                  <i class="bi bi-gear"></i>
                </span>
                <span class="title">Configurações</span>
              </a>
            </li>
  
            <li>
              <a href="../assets/dist/functions/sair.php">
                <span class="icon">
                 <i class="bi bi-box-arrow-right"></i>
                </span>
                <span class="title">Sair</span>
              </a>
            </li>
          </ul>
        </div>
  

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
              <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
              </div>
    
    
              <div class="user">
                <img src="../assets/dist/img/customer01.jpg" alt="" />
              </div>
            </div>

            <!-- Formulário centralizado -->
            <div class="form-container">
                <form action="../assets/dist/functions/adicionar-gastos.php" method="POST">
                    <h2>Adicionar Gastos</h2>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="number" id="valor" name="valor" required>
                    </div>
                    <div class="form-group">
                        <label for="data">Data da Despesa</label>
                        <input type="date" id="data" name="data" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" name="categoria" required>
                            <option value="Alimentacao">Alimentação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/dist/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
</body>
</html>
