<?php 
    include '../conexao.php';
    $nome = $_POST["txtNome2"];
    $sobrenome = $_POST["txtSobrenome2"];
    $sala = $_POST["txtSala2"];
    $telefone = $_POST["txtTelefone2"];
    $email = $_POST["txtEmail2"];
    $SQL = "UPDATE arthur_assis.alunos SET nome = '$nome', sobrenome = '$sobrenome', sala = '$sala', telefone= '$telefone', email= '$email' WHERE id = ".$_GET["id"];
    if (pg_query($conn, $SQL) === TRUE) {
        echo "<script>window.location = 'indexl.html';</script>";
    } else {
        echo "<script>window.location = 'listarAluno.php';</script>";
    }
?>