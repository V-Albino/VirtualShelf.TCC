<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/bootstrap/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        *{
            margin: 0;
            border: none;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 100vw;
            min-height: 100vh;
            background-color: rgb(14, 152, 165);
            font-family: 'Lato', sans-serif;

        }
        main.container{
            background-color: rgb(211, 236, 255);
            padding: 2rem;
            border-radius: 2px;
            max-height: 350px;
            max-width: 20vw;
            box-shadow: 5px 5px 15px rgba(0,0,0, 0.4);
        }
        main h2{
            font-weight: 400;
            margin-bottom: 2rem;
            position:relative
        }
        .input-field input {
            background: none;
            margin-bottom: 1.5rem;
            outline: none;
            color: #6c757d;
        }
        form{
            display:flex;
            flex-direction: column;
        }
        
        .input-field input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px rgb(211, 236, 255) inset;
        }
        .btn-box{
            display: inline;
        }
    </style>
</head>
<body>
    <main class="container justify">
        <h2>Login</h2>
        <h6>Usuário inválido!</h6><br>
        <form action="confirmaLogin.php" method="post">
            <div class="input-field">
                <input type="text" name="username" id="username" placeholder="Instituição">
                
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Senha">
                
            </div>
            <div class="btn-box">
                <input class="btn btn-outline-secondary" style="margin-right: 1rem;" type="submit" value="Continue">
                <input class="btn btn-outline-secondary" style="margin-right: 1rem;" type="reset" value="Cancelar">
            </div>
        </form>
           
    </main>
</body>
</html>