<?php  
$quebrada2 = explode("|", $_GET["tenhoquequebrar2"],2);
    include '../conexao.php';
    $SQL = "UPDATE arthur_assis.alunos SET livroalugado = 'Nenhum', diadevolucao = 'null' WHERE id = '$quebrada2[0]'; UPDATE arthur_assis.livros SET alugado = 'Não' WHERE idl = '$quebrada2[1]'";
    if (pg_query($conn, $SQL) === TRUE) {
        echo "<script>window.location = 'listarAluno.php';</script>";
    } else {
        echo "<script>window.location = 'listarAluno.php';</script>";
    }
    pg_close();
?>