<?php
    $Paths = array();
    $Paths['Root'] = "/hw1";
    $Paths['Javascript'] = "/hw1/Javascript/";
    $Paths['CSS'] = "/hw1/CSS/";
    $Paths['Utils'] = "/hw1/Utils/";
    $Paths['Res'] = "/hw1/Images/";
    $Paths['Res_index'] = "/Images/Index/";


    function getPath($File = "",$Folder = "Root") {
        global $Paths;
        if (isset($Paths[$Folder])) {
            return "\"".$Paths[$Folder].$File."\"";
        }
    }
?>