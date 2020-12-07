 function CriaRequest() {
     try{
         request = new XMLHttpRequest();
     }catch (IEAtual){

         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");
         }catch(IEAntigo){

             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(falha){
                 request = false;
             }
         }
     }

     if (!request)
         alert("Seu Navegador não suporta Ajax!");
     else
         return request;
 }

 function GetDados(){

    var codigo = document.getElementById("codigo").value;
    var busca = document.getElementById("busca");
    var res = document.getElementById("res");

    var xmlreq = CriaRequest();

    xmlreq.open("GET", "buscar.php?codigo=" + codigo, true);

    xmlreq.onreadystatechange = function(){
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                res.innerHTML = xmlreq.responseText;
                $(".container:not(:first)").remove();
             }else{
                res.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send();
 }

$('#btncadastar').click(function() {

    var marca = $('#marca').val();
    var gen = $('#gen').val();
    var subgen = $('#subgen').val();
    alert("marca: " + marca +",gen: "+ gen +",subgen: " +subgen);
    var phpurl = 'entradasnovas.php',
    data = {'marca':marca,'gen':gen,'subgen':subgen};
    $.post(phpurl, data, function (response) {
        // Response div goes here.
        alert("action performed successfully");
    });

});