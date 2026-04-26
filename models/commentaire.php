<?php
require_once 'db.php';
class commentaire extends db{
    public function getDb(){
        return Db::getInstance();
    }
    public function supprcom($id){
        $dbh = $this->getDb();
        if( !empty($id) )
        {
            $requser = $dbh->prepare("SELECT * FROM commentaire WHERE id = ?  ");
            $requser->execute(array($id));


            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                $req = $dbh->prepare('DELETE FROM commentaire WHERE id = :id ');
                $req->execute([
                    ':id' => $id]);


            }
            else
            {
                $erreur = "Mauvais mail ou mot de passe incorrect !";
            }
        }
    }
    public function countCommentaire(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT COUNT(*) as somme FROM commentaire');
        $stmt->execute();

        while ($result = $stmt->fetch()){
            echo $result[0];
        }
    }  public function countCommentaireuser($id){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT COUNT(*) as somme FROM commentaire where id_user="'.$id.'"');
        $stmt->execute();

        while ($result = $stmt->fetch()){
            echo $result[0];
        }
    } 
    public function getCommentaire(){
        $dbh = $this->getDb();

        $stmt = $dbh->prepare('SELECT *  FROM commentaire JOIN article JOIN users ORDERBY id_article');
        $stmt->execute();

        while ($result = $stmt->fetch()){
            $id = $result['id'];
            global $pseudo;
            $pseudo = $result['pseudo'];
            global $photopp;
            $photopp = $result['photoprofil'];

            global $com;
            $com = $result['comm'];

            global $titre;
            $titre = $result['titre'];

            echo " <div class='col-md-8 col-md-offset-1 tour'>
                    <div class='thumb'>
                    <h2>";
            echo $titre;
            echo "</h2>";

            if(!empty($photopp)){
                echo"
                                    <img src='uploads/"; echo $photopp ;"  class='img-circle 'width='35px' height='35px' align=''>";
            }
            else{
                echo "
                                    <img src='../uploads/marianne3.png'  class='img-circle 'width='35px' height='35px' align=''> "; }

            echo "</div>
                                <div class='detail'>
                                    <p><a href='#'>";
            echo $pseudo; 
            echo "</a>";

            echo"
                                        <mute >";
            echo $com;
            echo "</mute> 


                                    </p>
                                </div>
                                 <form>
                     <input class='id' name='id' value='$id '>
                    <input type='submit' class='col-md-12  del' href='#delarticle'  name='supprcom' value='Supprimer' style='margin-top:-20px;'>
                    </form>
                            </div>";
        }


    }
    public function sendcomm($message,$id_user,$id_article){
        $dbh = $this->getDb();
        $insertmbr =$dbh->prepare("INSERT INTO commentaire (comm, id_user,id_article) VALUES (?, ?,?) ");
        $insertmbr -> execute(array($message, $id_user,$id_article));
    }
    public function commall($id){
        $dbh = $this->getDb();
        $com = $dbh->prepare("SELECT * FROM commentaire WHERE id_article = ? ORDER BY id   ");
        $com->execute(array($id));

       $result = $com->fetchAll();
        return $result;
       }
  

}