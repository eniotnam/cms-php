<?php
$tab= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
for ($i = 0 ; $i < 8 ;$i++){
    
 echo  $tab[rand(0,strlen($tab))];
}



?>