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
    <title>FinAI</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/dist/css/ia-page.css" />


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

    <!-- Booststrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
   
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
              <a href="#">
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

    <div class="search">
      <label>
        <input type="text" placeholder="Busque informações aqui" />
        <ion-icon name="search-outline"></ion-icon>
      </label>
    </div>

    <div class="user">
      <img src="../assets/dist/img/customer01.jpg" alt="" />
    </div>
  </div>

  <main>
    <section id="chat">
      <div id="mensagens" class="chat-box">
        <!-- Aqui serão exibidas as mensagens do chat -->
        <div class="chat-message received">
          <p>Olá, como posso te ajudar hoje?</p>
        </div>
      </div>
      <div id="enviar-mensagem" class="user-input">
        <input type="text" id="texto-mensagem" placeholder="Digite sua mensagem" />
        <button id="botao-enviar">Enviar</button>
      </div>
    </section>
  </main>
</div>


<!-- =========== Scripts =========  -->
    <script>
      document.getElementById("botao-enviar").addEventListener("click", function() {
        let textoMensagem = document.getElementById("texto-mensagem").value;
        if (textoMensagem.trim() !== "") {
          let mensagensDiv = document.getElementById("mensagens");
          let userMessage = document.createElement("div");
          userMessage.className = "chat-message sent";
          userMessage.innerHTML = `<p>${textoMensagem}</p>`;
          mensagensDiv.appendChild(userMessage);
          
          document.getElementById("texto-mensagem").value = "";

          fetch("../assets/dist/functions/chatgpt.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `mensagem=${encodeURIComponent(textoMensagem)}`,
          })
          .then(response => response.json())
          .then(data => {
            let botMessage = document.createElement("div");
            botMessage.className = "chat-message received";
            botMessage.innerHTML = `<p>${data.resposta}</p>`;
            mensagensDiv.appendChild(botMessage);

            mensagensDiv.scrollTop = mensagensDiv.scrollHeight;
          })
          .catch(error => {
            console.error("Erro:", error);
          });
        }
      });
    </script>
    <script src="../assets/dist/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
