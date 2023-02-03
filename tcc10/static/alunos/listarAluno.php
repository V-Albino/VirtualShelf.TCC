<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../templates/pag.css">
    <style>
    a{
        margin-left: 0px;
        margin-top: 0px;
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
                <a class="btn btn-outline-light" href="../../static/livros/listarLivro.php">Livros</a>
            </div>
        </div>
    </div><!--header-->
            
            <?php 
            include '../conexao.php';
            $sql = "SELECT * FROM arthur_assis.alunos ORDER BY nome LIMIT 10 OFFSET 0";
            $result = pg_query($conn, $sql);
            $sql2 = "SELECT * FROM arthur_assis.alunos ORDER BY nome";
            $result2 = pg_query($conn, $sql2);
            $numtabelas = pg_num_rows($result2);
            $numpaginas = floor(($numtabelas-1)/10);
            $numbotoes = $numpaginas+1;
            if ($result) {
        ?>
        <div class="container col-md-4 d-flex justify-content-center">
                <form action="pesquisaAlunos.php" method="post">
                    <div class="search-box">
                        <input class="search-txt" name="consulta" id="txt_consulta" placeholder="Pesquisar" type="text" class="" style="width:20rem" >
                        <button class="search-btn" type="submit"><img src="../img/search.png" alt="lupa" style="height: 20px; width: 20px; margin:5px;"></button>
                    </div><!--search-box-->
                </form>
                
        </div>
        <div class="container">
            <div class="tabela-fundo">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Sala</th>    
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>  
                        <th scope="col">Alugado</th> 
                        <th scope="col">Devolução</th> 
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    
                    <?php
                    while ($exibir = pg_fetch_assoc($result)){
                        ?>
                        <tr>
                        <?php
                        if($exibir["diadevolucao"]!='null'){
                            $hj = date('d'); $hj2 = date('m'); $hj3 = date('Y'); 
                            $dev = date('d', strtotime('+7 days')); $dev2 = date('m', strtotime('+7 days')); $dev3 = date('Y', strtotime('+7 days')); 
     
                            $txt=$hj3 . "-" . $hj2 . "-" . $hj; $txt2=$exibir["diadevolucao"]; $txt3=$hj3.$hj2.$hj;
    
                            $datahj = date_create($txt);
                            $datadevolucao = date_create($txt2);
                            $resultado = date_diff($datadevolucao, $datahj);
                            $resultado2 = date_interval_format($resultado, '%a');
                        }
                        ?>
    
                            <td><?php echo $exibir["id"] ?> </td>
                            <td><?php echo $exibir["nome"] ?> </td>
                            <td><?php echo $exibir["sobrenome"] ?> </td>
                            <td><?php echo $exibir["sala"] ?> </td>
                            <td><?php echo $exibir["telefone"] ?> </td>
                            <td><?php echo $exibir["email"] ?> </td>
                            <td><?php echo $exibir["livroalugado"]; ?></td>
    
                            <?php if($exibir["diadevolucao"]=='null'){ ?> 
                                <td>---</td> 
                            <?php } elseif ($exibir["diadevolucaon"] - $txt3 >= 0){
                                    if($resultado2=='0'){ ?>
                                        <td><?php echo 'Hoje'; ?></td> <?php
                                    } elseif($resultado2=='1'){ ?>
                                        <td><?php echo 'Amanhã'; ?></td> <?php
                                    } else { ?>
                                        <td><?php echo $resultado2 . ' dias'; ?></td> <?php
                                    }
                            } else { 
                                $atraso=$exibir["diadevolucaon"] - $txt3; $atrasop=$atraso*-1;?> 
                                <td style="color:red;"><?php echo 'Atrasado ' . $atrasop . ' dias'; ?></td>
                    <?php } ?>

                        <td><a title="Editar registro" class="edit" href="updateAluno.php?id=<?php echo $exibir["id"] ?>"><svg xmlns="http://www.w3.org/2000/svg" style="color: #6c757d;" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a></td>

                        <td><a title="Apagar" class="delet" href="deleteAluno.php?id=<?php echo $exibir["id"] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="color: #6c757d; margin-top: auto;" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg></a></td>

                        <?php if ($exibir["livroalugado"]=='Nenhum'){ ?>
                        <td><a title="Alugar" class="alugarL" href="listaLivrosAlugar.php?idaluno=<?php echo $exibir["id"] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="color:#6c757d; margin-top: auto;"fill="currentColor" class="bi bi-journal-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 11a.5.5 0 0 0 .5-.5V6.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 .5.5z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                        </svg></a></td><!--alugar-->
                        <?php }else{ 
                                $paraquebrar2= $exibir["id"] . "|" . $exibir["iddolivro"];
                        ?>
                            <td><a title="Devolver Livro" class="devoL" href="devolverLivro.php?tenhoquequebrar2=<?php echo $paraquebrar2 ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="color:#6c757d; margin-top: auto;" fill="currentColor" class="bi bi-journal-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg></a></td><!--devolver-->
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                    <?php for($i=1;$i<=$numbotoes;$i++) {?>
                        <li class="page-item"><a class="page-link" href="listarAluno2.php?nbotao=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                        <li class="page-item"><a class="page-link" href="listarAluno2.php?nbotao=<?php echo 2 ?>">Próximo</a></li>
                    </ul>
                </nav><!--paginacao-->

                <div class="d-flex justify-content-end">
                <a title="Voltar" onclick="history.back()" class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg></a><!--voltar-->
                    <a title="Adicionar Aluno" style="margin-left: 2rem" class="btn btn-outline-secondary" href="addAluno.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-add disabled" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg></a><!--adicionar-->
                </div>
            </div><!--tabela-fundo-->
        </div><!--container-->
        <?php
        }
        else {
            echo "Nenhum registro encontrado.";
        }
        pg_close();
    ?>
    <br>
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