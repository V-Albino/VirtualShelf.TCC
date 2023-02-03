<?php 
    include '../conexao.php';
    $nome = $_POST["txtNome"];
    $autor = $_POST["txtAutor"];
    $editora = $_POST["txtEditora"];
    $genero = $_POST["txtGenero"];
    $ano = $_POST["numAno"];
    $isbn = $_POST["txtIsbn"];
    $sql = "INSERT INTO arthur_assis.livros (nomel, autor, editora, genero, ano, alugado, isbn) VALUES ('$nome', '$autor', '$editora', '$genero', '$ano', 'Não', '$isbn')";
    if (pg_query($conn, $sql) === TRUE) {
        echo "<script>window.location = 'indexl.html';</script>";
    } else {
        echo "<script>window.location = 'listarLivro.php';</script>";
    }
    pg_close();
?>