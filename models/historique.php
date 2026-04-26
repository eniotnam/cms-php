<?php 
header('Content-Type:  application/json; charset=utf-8');
require_once 'mail.php';
require_once 'commentaire.php';
$com = new commentaire;
$email = new email;

if(!empty($_GET['q'])){
    $mail =htmlentities($_GET['q']);
    $exist = true;
   
    if(file_exists('historique')){
        $historique = json_decode(file_get_contents('historique'), true);
        foreach($historique as $maile){
            if($maile['mail'] == $mail){
                $exist = false;
            }
        }
        if($exist){
            array_push($historique, 
                       ['mail' => $mail]); 
            file_put_contents('historique', json_encode($historique));	
            
            echo "<label style='color:green'>Vous êtes inscrit(e) à notre Newletter</label>";
        }
        else{
            echo "<label style='color:red'>Ce mail est déja enregistré</label>";
        }
    } else {
        $historique = [];
        array_push($historique, 
                   ['mail' => $mail]); 
        file_put_contents('historique', json_encode($historique));	
        
        echo "<label style='color:green'>Vous êtes inscrit(e) à notre Newletter</label>";
    }

}



