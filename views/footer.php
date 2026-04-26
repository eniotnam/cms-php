
 <footer class="col-xs-12 col-md-12 col-sm-12 footer">
        <img class="fond"src="img/background-home-page.jpg" width="100%" height="200px;">
        <div class="col-xs-12 col-md-12  col-sm-12 logo">
            <div class="col-xs-2 col-xs-offset-5 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5 caselogo">
                <img  src="img/logo.png" width="100%;" />
            </div>
        </div>
        <nav class="col-xs-12 col-md-12  col-sm-12 footl">
            <ul class="col-xs-12 col-md-12  col-sm-12 footlist">
                <li class="col-xs-2  col-sm-2 col-sm-offset-1 col-md-2  col-md-offset-1">
                    <a href="index.php">Accueil</a>
                </li>

                <li class="col-xs-2 col-md-2  col-sm-2" >
                    <a  href="allcat.php">blog</a>
                </li>

                <li class="col-xs-3 col-md-2 col-sm-2">
                    <a  href="apropos.php">À propos</a>
                </li>
                <li class="col-xs-3 col-md-2 col-sm-2" >
                    <a  href="contact.php">contact</a>
                </li>

                <li class="col-xs-2 col-md-2 col-sm-2 ">
                    <a  href="CGU.php">CGU</a>
                </li>

            </ul>
        </nav>

    </footer>
 

    <script type="text/javascript">
      
    
 

         $(function(){
 // On recupere la position du bloc par rapport au haut du site
 var position_top_raccourci = $("#navigation").offset().top;
             
if(window.innerWidth <768){
 var position_top_raccourci = $("#navigation2").offset().top;
}
 
 //Au scroll dans la fenetre on déclenche la fonction
 $(window).scroll(function () {
 
 //si on a defile de plus de 150px du haut vers le bas
 if ($(this).scrollTop() > 150) {
 
 //on ajoute la classe "fixNavigation" a <div id="navigation">
     
      $('#img').removeClass("col-md-3");
 $('#img').addClass("col-md-2");
     $('#first').css('margin-left','40px');
     
  if(window.innerWidth >768){
       $('#first').css('margin-left','40px');
     $('#img').css('margin-left','40px');
     $('#img').css('margin-right','40px');
  }
 } else {
 
 //sinon on retire la classe "fixNavigation" a <div id="navigation">
 $('#img').removeClass("col-md-2");
     $('#img').addClass("col-md-3");
      $('#first').css('margin-left','20px');
       $('#img').css('margin-left','30px');
     $('#img').css('margin-right','20px');
 }
 });
 });
    </script>
</body>
</html>