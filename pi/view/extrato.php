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

    <title>FinAI | Bem-vindo</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/dist/css/home.css" />

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
                    <a href="#">
                        <span class="logo">
                            <img src="../assets/dist/img/logofinAI.png" alt="Logo">
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
                    <a href="#">
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

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Extrato</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Título</td>
                                <td>Data</td>
                                <td>Valor</td>
                                <td>Categoria</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conexao = criarConexao();

                            $sqlCredito = "SELECT * FROM credito";
                            $resultadoCredito = mysqli_query($conexao, $sqlCredito);
                            $creditos = mysqli_fetch_all($resultadoCredito, MYSQLI_ASSOC);

                            $sqlDespesas = "SELECT * FROM despesas";
                            $resultadoDespesas = mysqli_query($conexao, $sqlDespesas);
                            $gastosDespesas = mysqli_fetch_all($resultadoDespesas, MYSQLI_ASSOC);

                            mysqli_close($conexao);

                            foreach ($creditos as $credito) {
                                $dataCredito = date('d-m-Y', strtotime($credito['data']));

                                echo "<tr>";
                                echo "<td style='color: black;'>" . $credito['titulo'] . "</td>";
                                echo "<td style='color: black;'>" . $dataCredito . "</td>";
                                echo "<td style='color: black;'> R$ " . $credito['valor'] . "</td>";
                                echo "<td style='color: black;'>" . $credito['categoria'] . "</td>";
                                echo "<td><span class='status delivered'>Crédito</span></td>";
                                echo "</tr>";
                            }

                            foreach ($gastosDespesas as $gasto) {
                                $dataDespesa = date('d-m-Y', strtotime($gasto['data']));

                                echo "<tr>";
                                echo "<td style='color: black;'>" . $gasto['titulo'] . "</td>";
                                echo "<td style='color: black;'>" . $dataDespesa . "</td>";
                                echo "<td style='color: black;'> R$ " . $gasto['valor'] . "</td>";
                                echo "<td style='color: black;'>" . $gasto['categoria'] . "</td>";
                                echo "<td><span class='status return'>Gasto</span></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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