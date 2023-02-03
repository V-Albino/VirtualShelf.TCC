<?php
    session_start();
    include '../static/conexao.php';
    $login=$_POST["username"];
    $senha=$_POST["password"];
    $sql = "SELECT * FROM arthur_assis.login";
    $result = pg_query($conn, $sql);
    if ($result) {
        while ($exibir = pg_fetch_assoc($result)){
            if($login==$exibir["email"] && $senha==$exibir["senha"]){
                echo "<script>window.location = 'home.php';</script>";
            }else{
                echo "<script>window.location = 'login2.php';</script>";
            }
        }
    }
    else {
        echo "Nenhum registro encontrado.";
    }
    pg_close();
    
?>