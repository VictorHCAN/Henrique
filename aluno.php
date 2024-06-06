<?php
    session_start();
    include_once('config.php');
    // Verifica se a sessão está vazia
    if(empty($_SESSION['email']) || empty($_SESSION['senha'])) {
        // Destroi as variáveis de sessão
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        // Redireciona para a página de login
        header('Location: login.php');
    }
    // Obtém o email do usuário logado
    $logado = $_SESSION['email'];

    $sql = "SELECT * FROM usuario where dif = 1 ORDER BY nome DESC";

    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA</title>
     <style>

        body {
            color: white;
            min-height: 100vh;
            background: url(img5.jpeg);
            background-size: cover;
            background-position: center;
            text-align: center;
        }
        .navbar-custom {
            height: 0px; /* Defina a altura desejada */
        }
        .table-bg {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(5px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            border-radius: 15px 15px 15px 15px;
        }
        .table td, .table th {
            font-size: smaller; /* Reduzindo o tamanho da fonte */
            white-space: nowrap; /* Evitando que o texto seja quebrado */
        }
        .table th:first-child, .table td:first-child {
            width: 20px; /* Ajustando a largura da primeira coluna */
        }
        .table th:nth-child(2), .table td:nth-child(2) {
            width: 40px; /* Ajustando a largura da segunda coluna */
        }
    </style> -->
    
</head>
<body>
    
<nav class="navbar navbar-dark bg-transparent navbar-custom">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-end align-items-center">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </div>
</nav>
      
    </nav>
    <br>
    <?php
        
        echo "<h1>Bem vindo a ECA <u>$logado</u></h1>";
    ?>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
       <tbody>
           <?php
               while($user_data = $result->fetch_assoc())
               {
                    echo "<tr>";
                    echo "<td>" .$user_data['matricula']."</td>";
                    echo "<td>" .$user_data['nome']."</td>";
                    echo "<td>" .$user_data['email']."</td>";
                    echo "<td>" .$user_data['senha']."</td>";
                    echo "<td>" .$user_data['telefone']."</td>";
                    echo "<td>" .$user_data['sexo']."</td>";
                    echo "<td>" .$user_data['data_nasc']."</td>";
                    echo "<td>" .$user_data['cidade']."</td>";
                    echo "<td>" .$user_data['estado']."</td>";
                    echo "<td>" .$user_data['endereco']."</td>";
                    echo "<td>ações</td>"; // Você precisa adicionar as colunas restantes aqui
                    echo "</tr>";
               }
           ?>
       </tbody>
       </table>
    </div>
</body>
</html>