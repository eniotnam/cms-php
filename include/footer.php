<?php 

function copyright(){
    $date = date('Y');
    echo "©Copyright ".$date." Voxkratos.com";
} 

?>
<html>
   <head>
       <style>
           .copyright {
               color: #e9ebee;
               
           }
           
           .footer {
               display:flex;
               background-color:black;
           }
           
           a{
               color: #e9ebee;
               text-decoration: none;
               margin:0 20px 0 20px;
           }
           a:visited {
                text-decoration: none;
           }

           a:hover {
            text-decoration: underline;
           }

           a:active {
            text-decoration: underline;
           }   
       </style>
   </head>
    <div class="col-md-12 footer">
      <div class="col-md-4 col-md-offset-1">
       <a href="#" >Contact</a>
       <a href="#" >Confidentialité</a>
       <a href="/Apropos.html" target="_blank">À propos</a>
       </div>
        <div class="col-md-3 col-md-offset-5 copyright">
            <?php copyright(); ?>
        </div> 
    </div>
</html>
