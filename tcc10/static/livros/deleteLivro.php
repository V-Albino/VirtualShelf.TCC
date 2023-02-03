<?php session_start();
    include '../conexao.php';
    $quebrar = explode("|", $_GET["quebrar"]);
    if(is_numeric($quebrar[1])){

        $SQL = "UPDATE arthur_assis.alunos SET livroalugado = 'Nenhum', diadevolucao = 'null', diadevolucaon = 0 WHERE livroalugado = '$quebrar[0]'; DELETE FROM arthur_assis.livros WHERE idl = '$quebrar[1]'";
        if (pg_query($conn, $SQL) === TRUE) {
            echo "<script>window.location = 'listarLivro.php';</script>";
        }
        else{
            echo "<script>window.location = 'listarLivro.php';</script>";
        }
    }
?>
