<?php
    $conn = pg_connect("host=200.18.128.54 port=5432 dbname=aula user=aula password=aula")
    or die("Failed to create connection to database: ". pg_last_error(). "<br/>");
    //$conn = pg_connect("host=10.90.24.54 port=5432 dbname=aula user=aula password=aula")
    //or die("Failed to create connection to database: ". pg_last_error(). "<br/>");
?>