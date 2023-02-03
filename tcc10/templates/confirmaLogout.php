<?php 
    session_start();
    include '../static/conexao.php';
    session_destroy();
    echo "<script>window.location = 'pagInicial.html';</script>";
    
?>