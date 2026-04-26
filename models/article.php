<?php
require_once 'db.php';

class article extends db{

    public function getDb(){
        return Db::getInstance();
    }
    public function meta($name){

        switch($name){
            case 'Together': echo "<title>Together</title>";
                break;
            case 'Angleterre': echo "<title>Angleterre</title>";
                break;
            case 'Paris': echo  "<title>Paris</title>";
                break;
            case 'Mode': echo  "<title>Mode</title>";
                break;
            case 'Food': echo  "<title>Food</title>";
                break;
            case 'Lifestyle': echo "<title>Lifestyle</title>";
                break;

            default;
        }
    }
    function autolink($string)
    {
        $content = explode('<br />',$string);
        $sentence ="";
        foreach($content as $content2){

            $content3 = explode(' ',$content2);


            foreach($content3 as $content1){

                if(preg_match("@(https://[^ ]+)@",$content1,$f)){

                    $nom = preg_split('/[.]+/i',$f[0]);
                    //        $nom= parse_url($til, PHP_URL_HOST);
                    //        echo $f;

                    $sentence.= preg_replace("@(https://[^ ]+)@", "<a class='lien' href=\"$1\" target='_blank'>".ucfirst($nom[1])."</a>", $content1);
                }
                else{
                    $sentence.=" ".$content1;
                }

            }
            $sentence.="<br />";
        }
        return $sentence;
    }
    public function premiers_mots($nombre,$texte)  
    {  
        $NouveauTexte="";
        $tabTexte = explode(" ", $texte);
        if(count($tabTexte)>$nombre){
            for($i=0; $i<$nombre; $i++)  
            { 
                $NouveauTexte .= " "."$tabTexte[$i]";  
            }
        }else{
            for($i=0; $i<count($tabTexte); $i++)  
            { 
                $NouveauTexte .= " "."$tabTexte[$i]";  
            }
        }
        $NouveauTexte .=" ...";
        return $NouveauTexte;  
    } 
    public function updateslider($slider,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE article set slider=? where id=? ");
        $insertmbr -> execute(array($slider,$id));
        header('location:allarticle.php?id='.$id);
    }
    public function updateslide($slider,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE categorie set slider=? where id=? ");
        $insertmbr -> execute(array($slider,$id));
        header('location:cat.php?id='.$id);
    }
    public function updateimg($texte,$slider,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE article set img=?,texte=? where id=? ");
        $insertmbr -> execute(array($slider,$texte,$id));
        header('location:allarticle.php?id='.$id);
    }
    public function testpic($img){
        $pic = $img['name'];
        $fil= $img['type'];
        $tmp= $img['tmp_name'];
        $mime_valid = ['image/png', 'image/jpeg','image/gif'];
        $extension_valid = ['png', 'jpeg','jpg','gif'];
        $extension = pathinfo($pic)['extension'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $tmp);


        if(in_array($extension, $extension_valid) && in_array($mime, $mime_valid)){

            move_uploaded_file($tmp, '../img/'.$pic);

        }
        //         return $pic;
    }

    public function pictraite(array $image){
        $l = 0;
        $j = 0;
        foreach($image['name'] as $key){

            $pic = $image['name'][$j];
            $fil= $image['type'][$j];
            $tmp= $image['tmp_name'][$j];
            $mime_valid = ['image/png', 'image/jpeg','image/gif'];
            $extension_valid = ['png', 'jpeg','jpg','gif'];
            $extension = pathinfo($pic)['extension'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmp);

            if(in_array($extension, $extension_valid) && in_array($mime, $mime_valid)){

                move_uploaded_file($tmp, '../img/'.$pic);
                $img[$l]= $pic;
                $l++;
                $j++;}
        }
        return $img;
    }

    public function lotarticle($textejson,$imgjson,$categoriejson,$sliderjson,$meta,$date,$auteur,$titre,$message,$prespicjson){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("INSERT INTO article (texte,img,categorie,slider,metadescription,date,auteur,titre,mesperso,photoillustre) VALUES (?,?,?,?,?,?,?,?,?,?) ");
        $insertmbr -> execute(array($textejson,$imgjson,$categoriejson,$sliderjson,$meta,$date,$auteur,$titre,$message,$prespicjson));
        header('location:adm.php');
    }  
    public function modart($textejson,$imgjson,$categoriejson,$date,$titre,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE article set texte=?,img=?,categorie=?,date=?,titre=? where id=? ");
        $insertmbr -> execute(array($textejson,$imgjson,$categoriejson,$date,$titre,$id));
        header('location:allarticle.php?id='.$id);
    }
    public function sliderupdate($slider,$date,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE article set slider=?,date=? where id=? ");
        $insertmbr -> execute(array($slider,$date,$id));
        header('location:allarticle.php?id='.$id);
    }
    public function slideru($img,$slider,$id,$titre){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE categorie set slider=?,nom=?,img=? where id=? ");
        $insertmbr -> execute(array($slider,$titre,$img,$id));
        header('location:cat.php?id='.$id);
    }
    public function modifauteur($prespic,$auteur,$message,$meta,$date,$id){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("UPDATE article set photoillustre=?,auteur=?,mesperso=?,metadescription=?,date=? where id=? ");
        $insertmbr -> execute(array($prespic,$auteur,$message,$meta,$date,$id));
        header('location:allarticle.php?id='.$id);
    }

    public function addcat($nom,$picjson,$sliderjson){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("INSERT INTO categorie (nom,img,slider) VALUES (?,?,?) ");
        $insertmbr -> execute(array($nom,$picjson,$sliderjson));
    }

    public function supprarticle($id){
        $dbh = $this->getDb();
        if( !empty($id) )
        {
            $requser = $dbh->prepare("SELECT * FROM article WHERE id = ?  ");
            $requser->execute(array($id));


            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                $req = $dbh->prepare('DELETE FROM article WHERE id = :id ');
                $req->execute([
                    ':id' => $id]);

                header('location:adm.php');
            }
            else
            {
                $erreur = "Mauvais mail ou mot de passe incorrect !";
            }
        }
    } public function supprcat($id){
        $dbh = $this->getDb();
        if( !empty($id) )
        {
            $requser = $dbh->prepare("SELECT * FROM categorie WHERE id = ?  ");
            $requser->execute(array($id));


            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                $req = $dbh->prepare('DELETE FROM categorie WHERE id = :id ');
                $req->execute([
                    ':id' => $id]);

                header('location:adm.php');
            }
            else
            {
                $erreur = "Mauvais mail ou mot de passe incorrect !";
            }
        }
    }

    public function countArticle(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT COUNT(*) as somme FROM article ');
        $stmt->execute();

        while ($result = $stmt->fetch()){
            echo $result[0];
        }
    }
    public function NextArt($id){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT id FROM article where id > ? LIMIT 1');
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }
    public function PreArt($id){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT MAX(id) FROM article where id < ? LIMIT 1');
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }
    public function getArticlebyid($id){

        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM article where id= ?');
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }
    public function getArticlelimit($limite){

        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM article order by id DESC limit '.$limite.' ');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getcat(){

        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM categorie order by id DESC;');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    } public function getcatby($name){

        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM categorie WHERE nom= ? order by id DESC;');
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        return $result;
    } public function getcatbyid($id){

        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM categorie WHERE id= ? ');
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result;
    }


    public function getArticleWID($id){

        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM article WHERE id = :id ');
        $arg = [
            ':id' => $id
        ];
        $stmt->execute($arg);
        $result = $stmt->fetch();
        return $result;
    }

    public function delarticle($id){
        $dbh = $this->getDb();
        $req = $dbh->prepare('DELETE FROM article WHERE id = :id ');
        $req->execute([
            ':id' => $id]);
    }

    public function getLastNews(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM article order by id DESC;');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }

    public function getBuzzNews(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM article DESC;'); //todo
        $stmt->execute();

        while ($result = $stmt->fetch()){
            $id = $result['id'];

            $titre = $result['titre'];

            //                $desc = $result['descri'];

            //                $contenu = $result['contenu'];

            $userid = $result['lien'];

            //                $datee = $result['datee'];

            $editedby = $result['editedby'];
        }
    }

    public function getMostVisitedNews(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT * FROM article ORDER BY id DESC;');
        $stmt->execute();

        while ($result = $stmt->fetch()){
            $id = $result['id'];

            $titre = $result['titre'];

            $desc = $result['descri'];

            $contenu = $result['contenu'];

            $userid = $result['lien'];

            $datee = $result['datee'];

            $editedby = $result['editedby'];
        }
    }
    public function getNewsLastWeek(){

        $date = date('d/m/Y');
        $datej = date('d');
        $datem = date('m');
        $datey = date('Y');
        $slash = '/';

        if($datej < 7){
            $datejj = $datej;
            $datemm = $datem -1;
            while($datej != 1){
                $datejj = $datej -1;
            }
            $datefinal = $datejj + $slash + $datemm + $slash + $datey;
        }else{
            $datejj = $datej - 7;
            $datefinal = $datejj + $slash + $datem + $slash + $datey;
        }

        $dbh = $this->getDb();
        $stmt = $dbh->prepare('SELECT * FROM article WHERE datee BETWEEN :datee AND :dateee LIMIT 3;');
        $arg=[
            ':datee' => $date,
            ':dateee' => $datefinal
        ];
        $stmt->execute($arg);

        while ($result = $stmt->fetch()){
            $id = $result['id'];

            $titre = $result['titre'];

            $desc = $result['descri'];

            $contenu = $result['contenu'];

            $userid = $result['lien'];

            $datee = $result['datee'];

            $editedby = $result['editedby'];

            echo"<div class='item'>
            <div class='row'>
                <div class='col-sm-3 text-center'>
                <img class='img-circle' src='#' href='article.php?id=$id'style='width: 100px;height:100px;'>
                </div>
                <div class='col-sm-9'>
                <p>$titre</p>
                <p>$desc</p>
                <small>$editedby</small>
                </div>
                </div>
            </div>";
        }
    }
}
?>