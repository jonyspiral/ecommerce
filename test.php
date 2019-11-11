<?php
 $array1=["No", "gusto","final","GOT"];
 $array2=["me","el","de","!"];
 function miOpinion ($parametro1,$parametro2){
   $fraseFinal='';
   for ($i=0;$i<4;$i++){
    $fraseFinal= $fraseFinal.$parametro1[$i]." ".$parametro2[$i]." ";

   }

    return $fraseFinal;

 }
 function numeros(){
   return [1,2,3,4,5,6,7,8,9];
  }
  function incrementar($num){
    return ++$num;

  }
echo incrementar(1)+1;

//echo numeros()[5];echo "</br>";
//echo miOpinion($array1,$array2);
//echo $GET['id']
?>
