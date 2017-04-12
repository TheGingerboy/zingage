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

    /*fonctions sur les articles*/
    function get_all_articles(){
        $connexion=connect_db();
        $articles=Array();
        $sql="SELECT * from gt_article";
        foreach($connexion ->query($sql) as $row){
            $articles[]=$row;
        }
        return $articles;
    }

    function get_all_articles_entretien(){
        $connexion=connect_db();
        $articles=Array();
        $sql="SELECT * from gt_article, gt_categorie WHERE id_categorie_article = id_categorie AND nom_categorie = 'entretien'";
        foreach($connexion ->query($sql) as $row){
            $articles[]=$row;
        }
        return $articles;
    }

    function get_all_articles_detente(){
        $connexion=connect_db();
        $articles=Array();
        $sql="SELECT * FROM gt_article, gt_categorie WHERE id_categorie_article = id_categorie AND nom_categorie = 'detente'";
        foreach($connexion ->query($sql) as $row){
            $articles[]=$row;
        }
        return $articles;
    }

    function get_all_comment_article($id){
        $connexion = connect_db();
        $comments = Array();
        $sql="SELECT * FROM gt_article, gt_comment, gt_user WHERE id_article_comment = '$id' AND id_article = '$id' AND id_user = id_user_comment";
        foreach($connexion ->query($sql) as $row){
            $comments[]=$row;
        }
        return $comments;
    }

    function add_commentaire($id, $data){
        session_start();
        $connexion = connect_db();
        $identifiant = $_SESSION['identifiant'];

        $getkey = mysql_query("SELECT id_user FROM gt_user WHERE identifiant_user='$identifiant'");
        $key = mysql_fetch_assoc($getkey);
        echo $key['id_user'];

        $sql="INSERT INTO gt_comment(titre_comment, text_comment, note_comment, id_user_comment, id_article_comment) VALUES(?,?,?,?,?)";
        $stmt=$connexion->prepare($sql);
        $stmt->execute(array('un titre', $data['commentaire'], 3, $key['id_user'], $id));
        return $stmt->fetch();      
    }

    function get_nb_comment($id){
        $connexion=connect_db();
        return $connexion->query("SELECT COUNT(*) FROM gt_article, gt_comment WHERE id_article_comment = '$id' AND id_article = '$id'")->fetchColumn();
    }

    function get_categ_par_article($id){
      $connexion=connect_db();
      $sql = "SELECT nom_categorie FROM gt_article, gt_categorie WHERE id_article = '$id' AND id_categorie_article = id_categorie";
      $categ = $connexion->query($sql)->fetchColumn();
      return $categ;
    }

    function get_five_detente(){
        $connexion = connect_db();
        $artDetente = Array();
        $sql='SELECT * FROM gt_article, gt_categorie WHERE id_categorie_article = id_categorie AND nom_categorie = "detente" LIMIT 0, 5';
        foreach($connexion ->query($sql) as $row){
            $artDetente[]=$row;
        }
        return $artDetente;
    }

    function get_five_entretien(){
        $connexion = connect_db();
        $artEntretien = Array();
        $sql='SELECT * FROM gt_article, gt_categorie WHERE id_categorie_article = id_categorie AND nom_categorie = "entretien" LIMIT 0, 5';
        foreach($connexion ->query($sql) as $row){
            $artEntretien[]=$row;
        }
        return $artEntretien;
    }

    function get_avant_article(){
        $connexion = connect_db();
        $enAvant = Array();
        $sql="SELECT * FROM gt_article WHERE en_avant_article = 1";
        foreach($connexion ->query($sql) as $row){
            $enAvant[]=$row;
        }
        return $enAvant;
    }

    function get_de_saison(){
        $connexion = connect_db();
        $deSaison = Array();
        $sql="SELECT * FROM gt_article WHERE saison_article = 1";
        foreach($connexion ->query($sql) as $row){
            $deSaison[]=$row;
        }
        return $deSaison;
    }

    function get_id_new_article(){
        $connexion=connect_db();
        $sql="SELECT * FROM gt_article WHERE id_article = (SELECT MAX(id_article) FROM gt_article)";
        return $connexion->query($sql)->fetch();
    }

    function get_innovation(){
        $connexion = connect_db();
        $sql = "SELECT * FROM gt_article WHERE inov_article = 1 ORDER BY id_article DESC LIMIT 1";
        return $connexion->query($sql)->fetch();
    }

    function get_article_by_id($id){
        $connexion=connect_db();
        $sql="SELECT * FROM gt_article where id_article=:id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    function add_article($data){
        $connexion=connect_db();
        $sql="INSERT INTO gt_article(nom_article, prix_article, img_article, id_categorie_article, description_article, DateAjout, dimension_article, poids_article, en_avant_article, saison_article, inov_article) VALUES(?,?,?,?,?,CURDATE(),?,?,?,?,?)";
        $stmt=$connexion->prepare($sql);
        //CURDATE()
        if($data['categ']=='detente'){
            $categ = 1;
        }else{
            $categ = 2;
        }
        if($data['mis_avant']=='oui'){
            $avant = 1;
        }else{
            $avant = 0;
        }
        if($data['saison']=='oui'){
            $saison = 1;
        }else{
            $saison = 0;
        }
        if($data['innov']=='oui'){
            $innov = 1;
        }else{
            $innov = 0;
        }
        $stmt->execute(array($data['nom'], $data['prix'], 'image.png', $categ, $data['desc'], $data['dimension'], $data['poids'], $avant, $saison, $innov));
        return $stmt->fetch();
    }

    function delete_article_by_id($id){
        $connexion=connect_db();
        $sql="DELETE from gt_article where id_article=:id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
	  }

    /*fonctions sur les commandes*/
    function get_all_commandes(){
      $connexion=connect_db();
      $commandes=Array();
      $sql="SELECT * FROM gt_commande, gt_user WHERE id_user = id_user_commande";
      foreach($connexion ->query($sql) as $row){
          $commandes[]=$row;
      }
      return $commandes;
    }

    function get_articles_from_commande($id){
      $connexion=connect_db();
      $artCommande = Array();
      $sql="SELECT * FROM gt_article, gt_commande_article WHERE id_article = id_articlej AND id_commandej = '$id'";
      foreach($connexion ->query($sql) as $row){
          $artCommande[]=$row;
      }
      return $artCommande;
    }

    function get_article_nb_jours($id){
        $connexion=connect_db();
        return $connexion->query("SELECT nb_article_commande FROM gt_article, gt_commande_article WHERE id_articlej = '$id' AND id_article = '$id'")->fetchColumn();
    }

    function modif_article($id, $data){
        $connexion=connect_db();
        if($data['categorie']=="detente"){
		$id_categorie=1;
		}
		else $id_categorie=2;
        if($data['mis_avant']=='oui')
            $avant = 1;
        else 
            $avant = 0;
        
        if($data['saison']=='oui')
            $saison = 1;
        else 
            $saison = 0;
        
        if($data['innov']=='oui')
            $innov = 1;
        else 
            $innov = 0;
        
        $sql="UPDATE gt_article SET nom_article=?, description_article=?, prix_article=?, dimension_article=?, poids_article=?, id_categorie_article=?, en_avant_article=?, saison_article=?, inov_article=? WHERE id_article='$id'";
        $stmt=$connexion->prepare($sql);
        $stmt->execute(array($data['nom'], $data['desc'], $data['prix'], $data['dimension'], $data['poids'], $id_categorie, $avant, $saison, $innov));
        return $stmt->fetch();        
    }

    /*fonctions sur les utilisateurs*/
    function get_all_users(){
        $connexion=connect_db();
        $users=Array();
        $sql="SELECT * FROM gt_user";
        foreach($connexion ->query($sql) as $row){
            $users[]=$row;
        }
        return $users;
    }

    function get_user_by_id($id){
        $connexion=connect_db();
        $sql="SELECT * from gt_user where id_user=:id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    function add_user($data){
        $connexion=connect_db();
        $sql="INSERT INTO gt_user(nom_user, prenom_user, mail_user, rue_user, complement_user, ville_user, cp_user, identifiant_user, mdp_user, tel_user, admin_user) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt=$connexion->prepare($sql);
        $stmt->execute(array($data['nom'], $data['prenom'], $data['mail'], $data['rue'], $data['cpt_rue'], $data['ville'], $data['cp'], $data['identifiant'], $data['mdp'], $data['tel'], 0));
        return $stmt->fetch();
    }

    function delete_user_by_id($id){
        $connexion=connect_db();
        $sql="DELETE from gt_user where id_user=:id";
        $stmt=$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
	  }

    /*modification des informations de GreenTeuf*/
    function modif_gt($data){
        $connexion=connect_db();
        if($data['img']!=null){
            $sql1="INSERT INTO gt_img_site(valeur_img_site) VALUES(?)";
            $stmt=$connexion->prepare($sql1);
            $stmt->execute(array($data['img']['name']));
        }
        if($data['tva']!=null){
            $sql2="INSERT INTO gt_tva(valeur_tva) VALUES(?)";
            $stmt=$connexion->prepare($sql2);
            $stmt->execute(array($data['tva']));
        }
        if($data['mail']!=null){
            $sql3="INSERT INTO gt_mail_site(valeur_mail_site) VALUES(?)";
            $stmt=$connexion->prepare($sql3);
            $stmt->execute(array($data['mail']));
        }
        if($data['tel']!=null){
            $sql4="INSERT INTO gt_tel_site(valeur_tel_site) VALUES(?)";
            $stmt=$connexion->prepare($sql4);
            $stmt->execute(array($data['tel']));
        }
        if($data['imgPart1']!=null){
            $sql5="INSERT INTO gt_partenaire(img_partenaire) VALUES(?)";
            $stmt=$connexion->prepare($sql5);
            $stmt->execute(array($data['imgPart1']['name']));
        }
        if($data['imgPart2']!=null){
            $sql6="INSERT INTO gt_partenaire(img_partenaire) VALUES(?)";
            $stmt=$connexion->prepare($sql6);
            $stmt->execute(array($data['imgPart2']['name']));
        }
        if($data['imgPart3']!=null){
            $sql7="INSERT INTO gt_partenaire(img_partenaire) VALUES(?)";
            $stmt=$connexion->prepare($sql7);
            $stmt->execute(array($data['imgPart3']['name']));
        }
        
        $stmt->fetch();
    }

    function get_logo(){
        $connexion=connect_db();
        $sql="SELECT valeur_img_site FROM gt_img_site WHERE id_img_site = (SELECT MAX(id_img_site) FROM gt_img_site)";
        return $connexion->query($sql)->fetchColumn();
    }

    function get_tva(){
        $connexion=connect_db();
        $sql="SELECT valeur_tva FROM gt_tva WHERE id_tva = (SELECT MAX(id_tva) FROM gt_tva)";
        return $connexion->query($sql)->fetchColumn();
    }

    function get_mail(){
        $connexion=connect_db();
        $sql="SELECT valeur_mail_site FROM gt_mail_site WHERE id_mail_site = (SELECT MAX(id_mail_site) FROM gt_mail_site)";
        return $connexion->query($sql)->fetchColumn();
    }

    function get_tel(){
        $connexion=connect_db();
        $sql="SELECT valeur_tel_site FROM gt_tel_site WHERE id_tel_site = (SELECT MAX(id_tel_site) FROM gt_tel_site)";
        return $connexion->query($sql)->fetchColumn();
    }
 ?>
