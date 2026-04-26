<?php

class email{

    public function inscriNews($mail){
        $to      = $mail;
        $subject = 'Inscription Newletter FDTM';
       
        $headers = 'From:NEWSLETTER FDTM<contact@fillesdestempsmodernes.com>'. "\r\n";
         $headers .= 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $message = '<html >
    <head>
        <meta charset="UTF-8">
        <title>Filles des temps modernes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table width="600px" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr>
                <td colspan="2" style="background:url(\'https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/logo.png\')center no-repeat;background-size:cover;height:150px;">

                </td>
            </tr>
            <tr>
                <td colspan="2" style="background:url(\'https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/ballon.png\');height:550px;padding:20px;">

                    <center style="padding:200px 40px 200px 40px;background:rgba(254, 254, 254, 0.7); ">
                        <img src="https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/Bienvenue.png">
                        <h2 style="font-family:arial,sans-serif;font-weight:100;">Maintenant tu ne rateras plus une new !</h2>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="12" style="text-align:center;font-family:arial,sans-serif;font-weight:100;">
                    <h2>Tu veux découvrir un peu plus sur nous ?</h2>
                    <h2>Retrouvez nos meilleurs catégories :</h2>
                </td>
            </tr>


            <tr>
                <td style="background:url(\'https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/CATEGORIE-HP-MODE-FillesDesTempsModernes-JulietteBatte-CamillePetry.png\')center no-repeat;background-size:cover;height:280px;width:300px;"></td>
                <td bgcolor="#111" style="color:white;"><a style="padding:20px;color:white; text-decoration: none;"target="_blank" href="https://www.fillesdestempsmodernes.com/articlebycat.php?name=Mode"><center>
                    <img src="https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/Mode.png"><p style="font-family:arial,sans-serif;font-weight:100;">Retrouves les looks de Camille & Juliette </p>
                    </center></a>
                </td>
            </tr>
            <tr>
                <td bgcolor="#FFF" style="color:black;"><a style="padding:20px;color:black; text-decoration: none;"target="_blank" href="https://www.fillesdestempsmodernes.com/articlebycat.php?name=Together"> <center><img src="https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/Together.png"><p style="font-family:arial,sans-serif;font-weight:100;">Retrouves nos aventures de filles libérées</p></center></a></td>
                <td style="background:url(\'https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/IMG_4059.png\')center no-repeat;background-size:cover;height:280px;width:300px;"></td>

            </tr>
            <tr>

                <td style="background:url(\'https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/CATEGORIE-HP-Lifestyle-FillesDesTempsModernes-JulietteBatte-CamillePetry.png\')center no-repeat;background-size:cover;height:280px"></td>
                <td bgcolor="#111" style="color:white;" >  <a style="padding:20px;color:white; text-decoration: none;"target="_blank" href="https://www.fillesdestempsmodernes.com/articlebycat.php?name=Lifestyle"><center><img src="https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/Lifestyle.png"><p style="font-family:arial,sans-serif;font-weight:100;">Des articles qui valent le coup d\'être lues</p></center></a></td>
            </tr>
            <tr ><td colspan="2"><center ><h1 style="font-family:arial,sans-serif;font-weight:100;">À très vite fille des temps modernes !<img src="https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/emoji.png"></h1>    </center></td></tr>
            <tr ><td colspan="2"><center ><img src="https://cataclysmic-cosal.000webhostapp.com/temps_moderne/NWL/Camille%20&%20Juliette.png">    </center></td></tr>
        </table>


    </body>
</html>';
        mail($to, $subject, $message,$headers);
    }
    public function NEWinscriNews($mail){
        $to      = 'contact@fillesdestempsmodernes.com';
        $subject = 'Inscription Newletter FDTM';
        $message = $mail.' s\'est inscrit à votre newsletter';
        $headers = 'From:UN NOUVEL INSCRIT<'.$to.'>';
        mail($to, $subject, $message,$headers);
    }  
    public function contact($name,$phone,$subject,$mail,$message){
        $to = 'contact@fillesdestempsmodernes.com';
        $messages = $message."\n".$name."\n".$mail."\n".$phone;
         $headers = 'From:'.$name.'<'.$mail.'>';
        mail($to, $subject, $messages,$headers);
        
    }
    public function mailto(){
        $to      = 'marteantoine@gmail.com';
        $subject = 'Inscription VoxKratos';
        $message = "coucou";
        mail($to, $subject, $message);
    }
}
?>
