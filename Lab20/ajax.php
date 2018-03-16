<?php
$pattern=strtolower($_GET['pattern']);
$words=array("Hugo","Paco","Francisco", "Guillermo","Memo","Fatima","Luis","Carlos","José", "Benito", "Itzel", "Daniel", "Karla");
$response="";
$size=0;
for($i=0; $i<count($words); $i++)
{
   $pos=stripos(strtolower($words[$i]),$pattern);
   if(!($pos===false))
   {
     $size++;
     $word=$words[$i];
     $response.="<option value=\"$word\">$word</option>";
   }
}
if($size>0)
  echo "<select id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";
?>

<!---

$pattern1=strtolower($_GET['pattern1']);
$words=array("Hugo","Paco","Francisco", "Guillermo","Memo","Fatima","Luis","Carlos","José", "Benito", "Itzel", "Daniel", "Karla");
$response="";
$size=0;
for($i=0; $i<count($words); $i++)
{
   $pos=stripos(strtolower($words[$i]),$pattern1);
   if(!($pos===false))
   {
     $size++;
     $word=$words[$i];
     $response.="<option value=\"$word\">$word</option>";
   }
}
if($size>0)
  echo "<select id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";
?><---->
