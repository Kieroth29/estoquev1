var request = CriaRequest();

function CadastrarUsuario(){
  var dsc = document.getElementById("descprod").value;
  var bcd = document.getElementById("barcode").value;
  var ref = document.getElementById("ref").value;
  var mar = document.getElementById("marca").value;
  var gen = document.getElementById("gen").value;
  var sub = document.getElementById("subgen").value;

  var url= "cadastrar.php?descprod="+dsc+"&barcode="+bcd+"&ref="+ref+"&marca="+mar+
  "&gen="+gen+"&subgen="+sub;
  request.open("GET", url, true);
  request.setRequestHeader("Content-Type",
  "application/x-www-form-urlencoded");
  request.onreadystatechange = confirma;
  request.send(null);
}

function confirma(){

  if(request.readyState == 4){
    var response = request.responseText;
    var divmain = document.getElementById("cadastro");
    var formid = document.getElementById("fcadastro");
    var pelement = document.createElement("p");
    var text = document.createTextNode
    ("Parabéns " + response + ", Cadastro Concluido!");
    pelement.appendChild(text);
    divmain.replaceNode(pelement,frm);

    var ael = document.createElement("a");
    var pula = document.createElement("<br>");
    var textlink = document.createTextNode("voltar");

    ael.appendChild(textlink);
    ael.setAttribute("href","Cadastro.html");
    pelement.appendChild(pula);
    pelement.appendChild(ael);
   }
  }