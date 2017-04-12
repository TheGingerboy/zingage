<?php
    require("connexionBD.php");
    require("configSite.php");

    function connect_db(){
        $dsn="mysql:dbname=".BASE.";host=".SERVER;
        try{
            $connexion=new PDO($dsn,USER,PASSWD);
            $connexion -> exec("set names utf8");
        }catch(PDOException $e){
            printf("Echec connexion : %s\n", $e->getMessage());
            exit();
        }
        return $connexion;
    }
 ?>
