<?php 
    include '../conexao.php';
    $nome = $_POST["txtNome"];
    $autor = $_POST["txtAutor"];
    $editora = $_POST["txtEditora"];
    $genero = $_POST["txtGenero"];
    $ano = $_POST["numAno"];
    $isbn = $_POST["txtIsbn"];
    $SQL = "UPDATE arthur_assis.livros SET nomel = '$nome', autor='$autor', editora='$editora', genero='$genero', ano='$ano', isbn='$isbn' WHERE idl = ".$_GET["idl"];
    if (pg_query($conn, $SQL) === TRUE) {
        echo "<script>window.location = 'listarLivro.php';</script>";
    } else {
        echo "<script>window.location = 'listarLivro.php';</script>";
    }
?>