<?php
require_once 'db.php';
class user extends db{
    public function getDb(){
        return Db::getInstance();
    }

    public function modifadmin($profpic,$pseudo,$descri,$shortdescri,$mdp,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE admin SET img=?,Pseudo=?,description=?,shortdescription=?,mdp=? Where id = ?");
        $insertmbr -> execute(array($profpic,$pseudo,$descri,$shortdescri,$mdp,$id));
        header('location:adm.php#apropos');
    }
    
    public function adduser($mail,$admin,$rank,$pseudo,$mdp2,$mdp,$img,$fil,$id){
        $dbh = $this->getDb();


        if(filter_var($mail, FILTER_VALIDATE_EMAIL ))
        {

            $reqmail = $dbh->prepare("SELECT * FROM users WHERE email = ? ");
            $reqmail->execute(array($mail));
            $mailexist= $reqmail->rowCount();
            if($mailexist==0)
            {;
             if(strlen($pseudo)>=3)
             {

                 $reqmail = $dbh->prepare("SELECT * FROM users WHERE pseudo = ? ");
                 $reqmail->execute(array($pseudo));
                 $pseudoexist= $reqmail->rowCount();
                 if($pseudoexist == 0)
                 {
                     if($mdp==$mdp2)
                     {

                         if(strlen($mdp)>=8)
                         {
                             if (!empty($_FILES)) {

                                 $mime_valid = ['image/png', 'image/jpeg','image/gif'];
                                 $extension_valid = ['png', 'jpeg','jpg','gif'];
                                 $extension = pathinfo($img)['extension'];
                                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                                 $mime = finfo_file($finfo, $fil['tmp_name']);


                                 $reqadmin = $dbh->prepare("SELECT * FROM users WHERE pseudo = ? AND rank = 1 ");
                                 $reqadmin->execute(array($admin));
                                 $adminexist= $reqadmin->rowCount();
                                 if($adminexist == 1)
                                 {


                                     if(in_array($extension, $extension_valid) && in_array($mime, $mime_valid)){
                                         move_uploaded_file($fil['tmp_name'], '../uploads/' . $img);

                                         $insertmbr =$dbh->prepare("INSERT INTO users (pseudo, rank, email, mdpcrypt, photoprofil) VALUES (?, ?, ?, ?, ? ) ");
                                         $insertmbr -> execute(array($pseudo,$rank,$mail,$mdp,$img));

                                     }else{
                                         $erreurs = 'Extension Error';
                                     }

                                 }

                                 else
                                 {
                                     $erreurs = "vous n'êtes pas admin";
                                 }
                             }
                         }
                         else $erreurs = "mot de passe doit être composé de minimum 8 caractère";
                     }
                     else
                     {
                         $erreurs = "vos mot de passe ne sont pas identiques !";
                     }
                 }
                 else $erreurs ="pseudo déja pris";
             }
             else $erreurs ="pseudo doit être composé de minimum 3 caractères";
            }
            else {
                $erreurs = "Adresse mail déjà utilisée !";
            }

        }
        else
        {
            $erreurs = "Votre adresse mail n'est pas valide !";
        }

    }
    public function suppruser($id){
        $dbh = $this->getDb();
        if( !empty($id) )
        {
            $requser = $dbh->prepare("SELECT * FROM users WHERE id = ?  ");
            $requser->execute(array($id));


            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                $req = $dbh->prepare('DELETE FROM users WHERE id = :id ');
                $req->execute([
                    ':id' => $id]);


            }
            else
            {
                $erreur = "Mauvais mail ou mot de passe incorrect !";
            }
        }
    }

    public function name($id){
        $dbh = $this->getDb();
        $req = $dbh->prepare('SELECT * FROM users where id = :id');
        $req->execute([
            ':id' =>$id]);
        $res = $req->fetchAll(); 
        foreach($res as $item){
            echo '<h4 >Bienvenue '.$item['pseudo'].'</h4>';
        }

    }
    public function Newsletterinscription($mail){
        

$contenu_json =json_encode($mail);

// Nom du fichier à créer
$nom_du_fichier = 'mail.json';

// Ouverture du fichier
$fichier = fopen($nom_du_fichier, 'a');

// Ecriture dans le fichier
fwrite($fichier, $contenu_json);

// Fermeture du fichier
fclose($fichier);
     

    }
    public function getUser(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM users where rank != 1');
        $stmt->execute();
    }
    public function getAdmin($id){
        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM admin where id =?');

        $stmt->execute(array($id));

      $result = $stmt->fetch();
        return $result;
    }
    public function getAdminmore($auteur){
        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM admin where Pseudo= ?');

        $stmt->execute(array($auteur));

      $result = $stmt->fetch();
        return $result;
    }
    public function getAdmininfo(){
        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM admin ');

        $stmt->execute();

      $result = $stmt->fetchAll();
        return $result;
    }
    public function countUsers(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT COUNT(*) as somme FROM users where rank != 1');
        $stmt->execute();

        while ($result = $stmt->fetch()){
            echo $result[0];
        }
    }
    public function getUserInfo($id){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :id');
        $arg=[
            ':id' => $id
        ];
        $stmt->execute($arg);
        $result = $stmt->fetch();
        return $result;
    }
    public function getAdminInfos($id){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :id');
        $arg=[
            ':id' => $id
        ];
        $stmt->execute($arg);

        while ($result = $stmt->fetch()){


            global $id;
            $id = $result['id'];

            global $pseudo;
            $pseudo = $result['pseudo'];

            global $passwd;
            $passwd = $result['mdpcrypt'];

            global $email;
            $email = $result['email'];

            global $photopp;
            $photopp = $result['photoprofil'];

            global $rank;
            $rank = $result['rank'];
        }
    }

    public function getUserCommentaire($id, $idarticle){

        $dbh = $this->getDb();


        $stmt = $dbh->prepare('SELECT * FROM commentaire WHERE id_user = :id AND id_article = :articleid');
        $arg=[
            ':id' => $id,
            'articleid' => $idarticle
        ];
        $stmt->execute($arg);

        while ($result = $stmt->fetch()){


            global $id;
            $id = $result['id'];

            global $com;
            $com = $result['comm'];

            global $textid;
            $textid = $result['id_article'];

            global $userid;
            $userid = $result['id_user'];
        }
    }


    public function postUserCommentaire($id, $comentaire, $idarticle){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('INSERT INTO commentaire(id, comm, id_article, id_user) values(NULL, :com, :id_article, :id_user)');
        $arg=[
            ':com' => $comentaire,
            ':id_article' => $idarticle,
            ':id_user' => $id
        ];
        $stmt->execute($arg);
    }

    public function loadCommentaire($id_article){

        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM commentaire WHERE id_article = :id_article');
        $arg=[
            ':id_article' => $id_article
        ];
        $stmt->execute($arg);
        while ($result = $stmt->fetch()){


            global $id;
            $id = $result['id'];

            global $com;
            $com = $result['comm'];

            global $textid;
            $textid = $result['id_article'];

            global $userid;
            $userid = $result['user_id'];
        }
    }


    public function loadLike($id_article){

        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM vote WHERE id_article = :id_article');
        $arg=[
            ':id_article' => $id_article
        ];
        $stmt->execute($arg);

        while ($result = $stmt->fetch()){


            global $idlike;
            $idlike = $result['id'];

            global $jaime;
            $jaime = $result['voteyes'];

            global $unlike;
            $unlike = $result['voteno'];

            global $neutre;
            $neutre = $result['voteneutre'];

            global $id_article;
            $id_article = $result['id_article'];
        }

    }
    public function addLike($id_article, $clique){
        $dbh = $this->getDb();
        loadLike($id_article);
        if($clique == "jaime"){
            $jaime1 = $jaime + 1;
            $unlike1 = $unlike;
            $neutre1 = $neutre;
        }elseif($clique == "unlike"){
            $jaime1 = $jaime;
            $unlike1 = $unlike + 1;
            $neutre1 = $neutre;
        }else{
            $jaime1 = $jaime;
            $unlike1 = $unlike;
            $neutre1 = $neutre + 1;
        }
        $stmt = $dbh->prepare('INSERT INTO vote(id, voteyes, voteneutre, voteno, id_article) values(NULL, :voteyes, :voteneutre, :voteno, :id_article');
        $arg=[
            ':id_article' => $textid,
            ':voteyes' => $jaime1,
            ':voteno' => $unlike1,
            ':voteneutre' => $neutre1
        ];
        $stmt->execute($arg);
    }

    public function userChangePP($id, $photourl){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('INSERT INTO users(photoprofil) values(:photourl) where id = :id');
        $arg=[
            ':photourl' => $photourl,
            ':id' => $id
        ];
        $stmt->execute($arg);       
    }

    public function getUserCommentaireProfil($id){

        $dbh = $this->getDb();


        $stmt = $dbh->prepare('SELECT * FROM commentaire WHERE id_user = :id');
        $arg=[
            ':id' => $id
        ];
        $stmt->execute($arg);
        $result = $stmt->fetchAll();
        return $result;
    }

}
?>