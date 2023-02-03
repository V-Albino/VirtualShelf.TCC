<?php 
    include '../conexao.php';
    $nome = $_POST["txtNome"];
    $sobrenome = $_POST["txtSobrenome"];
    $sala = $_POST["txtSala"];
    $telefone = $_POST["txtTelefone"];
    $email = $_POST["txtEmail"];

    $sql = "INSERT INTO arthur_assis.alunos (nome, sobrenome, sala, telefone, email, livroalugado, diadevolucao, diadevolucaon) VALUES ('$nome', '$sobrenome', '$sala', '$telefone', '$email', 'Nenhum', 'null', 0)";
    if (pg_query($conn, $sql) === TRUE) {
        echo "<script>window.location = 'listarAluno.php';</script>";
    } else {
        echo "<script>window.location = 'listarAluno.php';</script>";
    }
    pg_close();
?>