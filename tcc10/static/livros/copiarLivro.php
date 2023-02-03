<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../templates/pag.css">
    <style>
        button {
            border-radius: 10px;
            font-size: 15px;
        }
        a{
            margin-left: 0px;
            margin-top: 0px;
        }
        #page-container {
            position: relative;
            margin-top: 2rem;
            min-height: 50vh;
        }
    </style>
    <script>
        function executaAcao(){
            window.location = "../../templates/home.php";
        }
    </script>
</head>

<body>
<div class="header">
        <div class="container">
            <div class="homebtn" onclick="executaAcao()">
                <h1 class="logo" title="Pagina inicial">Virtual Shelf</h1>
            </div>  
            <div class="btnBlock">
                <a class="btn btn-outline-light" href="../../static/alunos/listarAluno.php">Alunos</a>
            </div>
        </div>
    </div><!--header-->
    <div class='divstyle'>
        <div class="container" style="margin-top:5%;">
            <div class="tabela-fundo">
                <div class="d-flex justify-content-center">
                        <h1>Copiar Livro</h1>
                </div> 
                <?php 
                $quebrarcopiar = explode("|", $_GET["copiarquebrar"]);
                    $cnome=$quebrarcopiar[1]; $cautor=$quebrarcopiar[2]; $ceditora=$quebrarcopiar[3];
                    $cgenero=$quebrarcopiar[4]; $cano=$quebrarcopiar[5];
                ?>
                <form action="insertLivro.php" method="post" style="margin-top:2rem">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input class="form-control" type="text" name="txtNome" placeholder="Nome" readonly value="<?php echo $cnome ?>">    
                        </div>
        
                        <div class="col-md-3">
                            <label for="txtAutor" class="form-label">Autor</label>
                            <input class="form-control" type="text" name="txtAutor" placeholder="Autor" readonly value="<?php echo $cautor ?>">    
                        </div>
        
                        <div class="col-md-3">
                            <label for="txtEditora" class="form-label">Editora</label>
                            <input class="form-control" type="text" name="txtEditora" placeholder="Editora" readonly value="<?php echo $ceditora ?>">    
                        </div>
        
                        <div class="col-md-3">
                            <label for="txtGenero" class="form-label">Gênero</label>
                            <input class="form-control" type="text" name="txtGenero" placeholder="Gênero" maxlength="20" readonly value="<?php echo $cgenero ?>">    
                        </div>
        
                        <div class="col-md-3">
                            <label for="numAno" class="form-label">Ano</label>
                            <input class="form-control" type="number" name="numAno" placeholder="Ano" maxlength="4" readonly value="<?php echo $cano ?>">    
                        </div>
                        <div class="col-md-3">
                            <label for="txtIsbn" class="form-label">ISBN</label>
                            <input class="form-control" type="tect" name="txtIsbn" placeholder="Insira o ISBN deste exemplar" maxlength="4" required>    
                        </div>
                    </div><!--row-->
                    <br>
                    <input class="btn btn-outline-secondary" type="submit" name="btnSalvar" value="Salvar">
                    <input class="btn btn-outline-secondary" style="margin-left: 5px;" type="reset" name="btnCancelar" value="Cancelar">
                </form>
                <div class="d-flex justify-content-end">
                <a title="Voltar" href="listarLivro.php" class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg></a>
                    <a title="Menu Geral" class="btn btn-outline-secondary" style="margin-left:1.5rem" href="../../templates/home.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house disabled" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                    </svg></a><!--menugeral-->
                </div>
            </div><!--tabela-fundo-->
        </div><!--container-->
    </div><!--divstyle-->
    <div id="page-container">
        <footer id="footer">
            <div class="sobre">
                <div class="container baseboard">
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg> Email</a>

                    <a href="https://www.instagram.com/_arthur_artorius/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg> _arthur_artorius</a>

                    <a href="https://www.instagram.com/victor_brandao09/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                      </svg> victor_brandao09</a>
                </div>
            </div>
        </footer>
    </div><!--rodapé-->
</body>

</html>