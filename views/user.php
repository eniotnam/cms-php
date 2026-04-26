<?php
echo "Page Home<br>";
?>

<!-- AFFICHAGE USER/ADMIN-->

<div style="margin:auto;display:flex;flex-wrap:wrap;width:800px;">

<?php
for($i = 0 ; $i < sizeof($users); $i++){
    $photoprofil= $users[$i]['photoprofil'];
    $username = $users[$i]['pseudo'];
    $userstatu = $users[$i]['rank'];
    echo "<div style='width:120px;border:1px solid;padding:10px;margin:10px;text-align:center;'>".($photoprofil ? $photoprofil : 'pas de photo')."<br><br>".$username."<br><br>".($userstatu ==1 ? 'admin' : 'user')."<br></div>"; 
}
?>
</div>
