<?php

if (isset($_POST['professor'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuario(dif,nome,email,senha,telefone,sexo,data_nasc,cidade,estado,endereco) 
    VALUES (1,'$nome','$email','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

    header('Location: login.php');
}


if (isset($_POST['aluno'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuario(dif,nome,email,senha,telefone,sexo,data_nasc,cidade,estado,endereco) 
    VALUES (2,'$nome','$email','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(img2.jpg);
            background-size: cover;
            background-position: center;
            overflow-y: hidden;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            padding: 15px;
            border-radius: 15px;
            width: 25%;
        }
        fieldset{
            background: transparent;
        }
        legend{
            border: 1px solid rgb(46, 34, 34);
            padding: 10px;
            text-align: center;
            background-color: rgb(0, 0, 0);
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid rgb(0, 0, 0);
            outline: none;
            color: rgb(245, 245, 245);
            font-size: 15px;
            width: 100%;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }   
        #professor, #aluno {
            background-image: linear-gradient(to right, rgb(0, 0, 0), rgb(0, 0, 0));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            margin-top: 10px; /* Espaço entre os botões */
        }
        #submit:hover, #aluno:hover{
            background-image: linear-gradient(to right, rgb(45, 53, 61), rgb(53, 48, 61));
        }
        a[href="home.php"] {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff; /* Mudando a cor para branco para melhorar a visibilidade */
            text-decoration: none; /* Removendo sublinhado padrão */
            z-index: 999; /* Garantindo que fique acima de outros elementos */
        }
    </style>
    <script>
        function redirectToAluno() {
            window.location.href = "aluno.php";
        }
    </script>
</head>
<body>
    <a href="home.php">VOLTA</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Formulário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br>
                <br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br>
                <br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <button type="submit" name="professor" id="professor">Professor</button>
                <button type="submit" id="aluno" id="aluno">Aluno</button>
            </fieldset>
        </form>
    </div>
</body>
</html>