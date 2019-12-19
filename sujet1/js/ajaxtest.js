$(document).ready(function(){
    $.ajax({
        url : 'http://172.20.1.251/opendatafac/sujet1/controllerReponse.php',
        type : 'POST', // Le type de la requête HTTP, ici devenu POST
        data : ,
        success: function(result){
            console.log(result);
        }
     });
 

 });