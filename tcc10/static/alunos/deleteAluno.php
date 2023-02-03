<?php 
    include '../conexao.php';
    if(is_numeric($_GET["id"])){
        $iddoaluno = $_GET["id"];
        $SQL = "UPDATE arthur_assis.livros SET alugado = 'Não' WHERE iddoaluno = '$iddoaluno'; DELETE FROM arthur_assis.alunos WHERE id = '$iddoaluno'";
        if (pg_query($conn, $SQL) === TRUE) {
            echo "<script>window.location = 'indexl.html';</script>";
        }
        else{
            echo "<script>window.location = 'listarAluno.php';</script>";
        }
    }
?>
