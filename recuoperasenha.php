<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
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
            background: url(img.jpeg);
            background-size: cover;
            background-position: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Fundo preto transparente */
            padding: 2em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            color: white;
        }

        h1 {
            font-size: 1.5em;
            margin-bottom: 1em;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 2em;
        }

        input {
            margin-bottom: 1em;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 1em;
        }

        button {
            padding: 0.5em;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 1em;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        input::placeholder {
            color: #ccc; /* Placeholder color */
        }
    </style>
</head>
<body>
    <a href="home.php">VOLTA</a>
    <div class="container">
        <h1>Solicitar redefinição de senha</h1>
        <form id="request-reset-form">
            <input type="email" id="email" placeholder="Digite seu e-mail" required>
            <button type="submit">Solicitar redefinição</button>
        </form>

        <h1>Redefinir senha</h1>
        <form id="reset-password-form">
            <input type="email" id="reset-email" placeholder="Digite seu e-mail" required>
            <input type="text" id="reset-code" placeholder="Digite o código de redefinição" required>
            <input type="password" id="new-password" placeholder="Insira a nova senha" required>
            <button type="submit">Redefinir senha</button>
        </form>
    </div>

    <script>
        document.getElementById('request-reset-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            fetch('/request-password-reset', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(text) });
                }
                return response.json();
            })
            .then(data => alert(data.message))
            .catch(error => alert('Error: ' + error.message));
        });

        document.getElementById('reset-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('reset-email').value;
            const resetCode = document.getElementById('reset-code').value;
            const newPassword = document.getElementById('new-password').value;
            fetch('/reset-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email: email, reset_code: resetCode, new_password: newPassword })
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(text) });
                }
                return response.json();
            })
            .then(data => alert(data.message))
            .catch(error => alert('Error: ' + error.message));
        });
    </script>
</body>
</html>