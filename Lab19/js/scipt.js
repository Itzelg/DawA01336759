function main() {
  $('.projects').hide();

  $('.projects-button').on('click', function() {
        $(this).next().toggle();
    if($(this).text() == "Ocultar Permisos")
        $(this).text("Ver Permisos");
    else
        $(this).text("Ocultar Permisos");
    });
}

$(document).ready(main);


function greet() {
    console.log("js works");
}
greet();

function changeDisplay(){
    if(document.getElementById("userTable").getAttribute("style")=="display: none;")
        document.getElementById("userTable").setAttribute("style", "display: block;");
    else
        document.getElementById("userTable").setAttribute("style", "display: none;");
    for(var i=1; i<userTable.rows.length; i++){

        userTable.rows[i].onclick = function(){
            window.location.replace("visitantsView.php");
        }
    }
    console.log("ran");
}

function changeDisplay(){
    if(document.getElementById("sanctionTable").getAttribute("style")=="display: none;")
        document.getElementById("sanctionTable").setAttribute("style", "display: block;");
    else
        document.getElementById("sanctionTable").setAttribute("style", "display: none;");
    console.log("should have changed");
    for(var i=1; i<userTable.rows.length; i++){

        userTable.rows[i].onclick = function(){
            window.location.replace("sanctionsView.php");
        }
    }
    console.log("ran");
}


if(document.getElementById("userTable")!=null){
    document.getElementById("userTable").setAttribute("style", "display: none;");
    document.getElementById("buscarCliente").onclick=changeDisplay;
    userTable = document.getElementById("userTable");
}


if(document.getElementById("sanctionTable")!=null){
    document.getElementById("sanctionTable").setAttribute("style", "display: none;");
    document.getElementById("searchSanctions").onclick=changeDisplay;
    userTable = document.getElementById("sanctionTable");
}


addBookButton = document.getElementById("addBook");
if(addBookButton != null) {
    addBookButton.onclick = addBookInput;
}
var n = 0;
bookInputs = document.getElementsByClassName("book-input");

function addBookInput(){
    if(n < bookInputs.length){
        bookInputs[n].style.height = "86px";
        n = n+1;
        if( n >= bookInputs.length){
            addBookButton.style.display = "none";
        }
    }
}


addCatalogButton = document.getElementById("addCatalog");
if(addCatalogButton != null) {
    addCatalogButton.onclick = addCatalogInput;
}
var o = 0;
catalogInputs = document.getElementsByClassName("catalog-input");

function addCatalogInput(){
    if(o < catalogInputs.length){
        catalogInputs[o].style.height = "86px";
        o = o+1;
        if( o >= catalogInputs.length){
            addCatalogButton.style.display = "none";
        }
    }
}



function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');

			$(".icon-choose-image").css('opacity','0.5');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            processData:false,
            success: function(data)
            {
            $("#targetLayer").html(data);
            $("#targetLayer").css('opacity','1');
            },
            error: function()
            {
            }
       });
    }));
});


function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }

  function showResult1(str) {
    if (str.length==0) {
      document.getElementById("livesearch1").innerHTML="";
      document.getElementById("livesearch1").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch1").innerHTML=this.responseText;
        document.getElementById("livesearch1").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }

  function showResult2(str) {
    if (str.length==0) {
      document.getElementById("livesearch2").innerHTML="";
      document.getElementById("livesearch2").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {

      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch2").innerHTML=this.responseText;
        document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }

  function showResult3(str) {
    if (str.length==0) {
      document.getElementById("livesearch3").innerHTML="";
      document.getElementById("livesearch3").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {

      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch3").innerHTML=this.responseText;
        document.getElementById("livesearch3").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }

  function showResult4(str) {
    if (str.length==0) {
      document.getElementById("livesearch4").innerHTML="";
      document.getElementById("livesearch4").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {

      xmlhttp=new XMLHttpRequest();
    } else {  
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch4").innerHTML=this.responseText;
        document.getElementById("livesearch4").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }
