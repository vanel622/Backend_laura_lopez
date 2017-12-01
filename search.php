<?php


$showAll=$_GET["showAll"];
$type= $_GET["type"];
$city = $_GET["city"];
$minValue =  floatval($_GET["minValue"]);
$maxValue =  floatval($_GET["maxValue"]);

$json_url = "data-1.json";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);



    if ($showAll=="true"){


        foreach ($data as $realty) {

        $result =   '<div class="itemMostrado card">'.
            '<img src="img/' . random_int (1,10).'.jpg">'.
            '<ul>'.
            '<li><strong>Dirección: </strong>'.$realty["Direccion"].'</li>'.
            '<li><strong>Ciudad: </strong>'.$realty["Ciudad"].' </li>'.
            '<li><strong>Codigo Postal: </strong>'. $realty["Codigo_Postal"].' </li>'.
            '<li><strong>Telefono:</strong>'.$realty["Telefono"].' </li>'.
            '<li><strong>Tipo:</strong>'. $realty["Tipo"].' </li>'.
            '<li><strong>Precio:</strong> <span class="precioTexto">'.$realty["Precio"].'</span> </li>'.
            '</ul>'.
            '<div class="divider"></div>'.
            '<div style="margin-left:auto">'.
            '<button type="button" name="verMas" class="btn-flat waves-effect">VER MAS</button>'.
            '</div>'.
            '</div>';

        echo $result;
        }

    }else{


        foreach ($data as $realty) {

            $insert = false;

            //ciudad
            if ((($realty["Ciudad"]==$city) || $city=="Todas")==false){
                continue;
                //$insert = true;
            }

            //Tipo;
            if (($realty["Tipo"]==$type || $type=="Todos")==false){
                continue;
                //$insert = true;
            }

            //Precio;
            $priceRealty = floatval( str_replace(["$",","],"",$realty["Precio"]));
//            echo "Aqui..";
//            echo $priceRealty."Min :".$minValue." Max: ".$maxValue;

            if($priceRealty < $minValue || $priceRealty>$maxValue){
               // $insert = true;
            //}else{
                continue;
            }

            //if ($insert) {
                $result =   '<div class="itemMostrado card">'.
                    '<img src="img/' . random_int (1,10).'.jpg">'.
                    '<ul>'.
                    '<li><strong>Dirección: </strong>'.$realty["Direccion"].'</li>'.
                    '<li><strong>Ciudad: </strong>'.$realty["Ciudad"].' </li>'.
                    '<li><strong>Codigo Postal: </strong>'. $realty["Codigo_Postal"].' </li>'.
                    '<li><strong>Telefono:</strong>'.$realty["Telefono"].' </li>'.
                    '<li><strong>Tipo:</strong>'. $realty["Tipo"].' </li>'.
                    '<li><strong>Precio:</strong> <span class="precioTexto">'.$realty["Precio"].'</span> </li>'.
                    '</ul>'.
                    '<div class="divider"></div>'.
                    '<div style="margin-left:auto">'.
                    '<button type="button" name="verMas" class="btn-flat waves-effect">VER MAS</button>'.
                    '</div>'.
                    '</div>';
                echo $result;
            //}


        }


       // echo  json_encode($types);



    }
     ?>
