<?php

    if($_GET['s']){ //verificando se há alguma requisição GET
        $item_buscado = $_GET['s'];//atribuindo valor pro item buscado

        $con = new PDO('mysql: host=localhost; dbname=busca-youtube;', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $sql = "SELECT * FROM post WHERE titulo LIKE :busc";
        $sql = $con->prepare($sql);
        $sql->bindValue(':busc', '%'.$item_buscado.'%', PDO::PARAM_STR);
        $sql->execute();

        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $resultados[] = $row['titulo'];
        }

        echo json_encode($resultados);
    }