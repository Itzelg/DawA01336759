<?php
    function ejercicio1(){
        $array = array(10,50,38,40,20,5);
        $array2 = array(100,70,86,40,10);
        function promedio($arreglo){
            $sum = 0;
            for($i = 0; $i < count($arreglo);$i++){
                $sum += $arreglo[$i];
            }
            return $sum;
        }
        $prom1 = promedio($array);
        echo "<h3>El promedio del arreglo 1 es: $prom1 </h3>";
        $prom2 = promedio($array2);
        echo "<h3>El promedio del arreglo 2 es: $prom2 </h3>";
    }
    function ejercicio2(){
        $array = array(10,50,38,40,20,5);
        $array2= array(100,70,86,40,10);
        function mediana($arreglo){
            if(count($arreglo) % 2 != 0){
                $med = $arreglo[count($arreglo)/2];
                return $med;
            }
            $med1 = (count($arreglo))/2;
            $med2 = $med1-1;
            $med = ($arreglo[$med1]+$arreglo[$med2])/2;
            return $med;
        }
        $med1 = mediana($array);
        echo "<h3>La mediana del arreglo 1 es: $med1 </h3>";
        $med2 = mediana($array2);
        echo "<h3>La mediana del arreglo 2 es: $med2 </h3>";
    }
    function ejercicio3(){
        $array = array(10,50,38,40,20,5);
        $array2= array(100,70,86,40,10);
        function mediana($arreglo){
            if(count($arreglo) % 2 != 0){
                $med = $arreglo[count($arreglo)/2];
                return $med;
            }
            $med1 = (count($arreglo))/2;
            $med2 = $med1-1;
            $med = ($arreglo[$med1]+$arreglo[$med2])/2;
            return $med;
        }
        function promedio($arreglo){
            $sum = 0;
            for($i = 0; $i < count($arreglo);$i++){
                $sum += $arreglo[$i];
            }
            return $sum;
        }
        function enlista($arreglo){
            sort($arreglo);
            echo "Ordenado ascendente:<br/><ul>";
            for($i = 0; $i < count($arreglo);$i++){
                echo "<li>", $arreglo[$i] , "</li>";
            }
            echo "</ul>";
            echo"Ordenado descendente:<br/><ul>";
            rsort($arreglo);
            for($i = 0; $i < count($arreglo);$i++){
                echo "<li>", $arreglo[$i] , "</li>";
            }
            echo "</ul>";
            $med = mediana($arreglo);
            $prom = promedio($arreglo);
            echo "<br/><ul>";
            echo "<li>Mediana: $med</li>";
            echo "<li>Promedio: $prom</li>";
            echo "</ul>";
        }
        echo "<h3>Arreglo 1:</h3>";
        enlista($array);
        echo "<h3>Arreglo 2:</h3>";
        enlista($array2);
    }
    function ejercicio4(){
        $n = 15;
        $n2 = 30;
        function tabla($n){
            echo "<table><tr><td>Numero</td><td>Cuadrados</td><td>Cubos</td></tr>";
            for($i=1;$i<=$n;$i++){
                $cuad = $i*$i;
                $cub = $i*$i*$i;
                echo "<tr><td>$i</td><td>$cuad</td><td>$cub</td></tr>";
            }
            echo "</table>";
        }
        echo "<h3>Tabla de n = 15:</h3>";
        tabla($n);
        echo "<h3>Tabla de n = 30:</h3>";
        tabla($n2);
    }
?>
