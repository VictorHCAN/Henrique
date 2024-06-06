<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(img3.jpeg);
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(5px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 20px 30px;
        }

        .wrapper h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 10px;
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 10px;
        }

        .buttons button {
            padding: 0.5em 1em;
            background-color: transparent; /* Alterado para transparente */
            color: white;
            border: 2px solid white; /* Adicionada borda sólida branca */
            border-radius: 3px;
            font-size: 1em;
            cursor: pointer;
        }

        .buttons button:hover {
            background-color: #0056b3;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 45px;
            margin: 10px 0;  /* Reduced the margin to make the input fields closer */
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 0 45px 0 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -10px 0 10px;
        }

        .remember-forgot label input {
            accent-color: #111;
            margin-right: 3px;
        }

        .remember-forgot a {
            color: #111;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .inputSubmit {
            width: 100%;
            height: 45px;
            background: #111;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(245, 245, 245, 0.997);
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .register-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 10px;
        }

        .register-link p a {
            color: #111;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        a[href="home.php"] {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            text-decoration: none;
            z-index: 999;
        }

        form {
            display: none;
            flex-direction: column;
        }

        form.active {
            display: flex;
        }
    </style>
</head>
<body>
    <a href="home.php">VOLTA</a>
    <div class="wrapper">
        <h1>Login</h1>
        <div class="buttons">
            <button onclick="showForm('teacher')">Professor</button>
            <button onclick="showForm('student')">Aluno</button>
        </div>
        <form id="teacher-form" class="login-form active" action="testLogin.php" method="POST">
            <div class="input-box">
                <input type="text" name="email" placeholder="Email do professor" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Lembra-se de mim </label>
                <a href="recuoperasenha.php">Esqueceu sua senha?</a>
            </div>
            <input class="inputSubmit" type="submit" name="submit" value="Login como Professor">
        </form>

        <form id="student-form" class="login-form" action="testLogin.php" method="POST">
            <div class="input-box">
                <input type="text" name="email" placeholder="Email do aluno" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Lembra-se de mim </label>
                <a href="recuoperasenha.php">Esqueceu sua senha?</a>
            </div>
            <input class="inputSubmit" type="submit" name="submit" value="Login como Aluno">
        </form>

        <div class="register-link">
            <p>Não tem uma conta?<a href="formulario.php"> Registre-se</a></p>
        </div>
    </div>

   <script>
    function showForm(type) {
        document.querySelectorAll('.login-form').forEach(form => form.classList.remove('active'));
        document.getElementById(type + '-form').classList.add('active');
    }

    document.getElementById('student-form').addEventListener('submit', function(e) {
        if (document.getElementById('student-form').classList.contains('active')) {
            e.preventDefault();
            window.location.href = "aluno.php";
        }
    });
</script>
</body>
</html>