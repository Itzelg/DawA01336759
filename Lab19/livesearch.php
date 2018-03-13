<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("jambe.xml");
$x=$xmlDoc->getElementsByTagName('table');
//get the q parameter from URL
$q=$_GET["q"];
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('column');
    $z=$x->item($i)->getElementsByTagName('column');
    if (!empty($y->item(0)->nodeType) && $y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<p>".
          $z->item(0)->childNodes->item(0)->nodeValue .
          "</p>";
        } else {
          $hint=$hint . "<p>" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "</p>";
        }
      }
    }
  }
}
// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}
//output the response
echo $response;
?> 
