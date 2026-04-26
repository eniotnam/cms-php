var divhisto = $(".historique");
var mail;
var test;
//
//$(document).ready(function(){
//
//    $('#send').click(function(){
//        event.preventDefault();
//        $.post(
//            'models/historique.php',
//            {
//                mail :  $("#mail").val()
//            },
//            function(data){
//                divhisto.html('<label style="color:green">Vous êtes inscrit(e) à notre Newletter</label>');
//                console.log("post historique niquel");
//
//            }
//        );
//    });
//});


//#######VERIF DES MAILS###############
$(document).ready(function(){
    $('#send').on('click',function(){
        str = $("#mail").val();
       
        if (str  =="") {
            document.getElementById("txtHint").innerHTML="Champs vide";
            return;
        } 
        re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(str)){
            document.getElementById("txtHint").innerHTML="<label style='color:red'>Ce n'est pas une adresse mail</label>";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
        }

        xmlhttp.open("GET","models/historique.php?q="+str,true);
        xmlhttp.send();


    });
});



