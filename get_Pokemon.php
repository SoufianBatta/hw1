<?php
    include_once("Utils/DBManager.php");
    //Creo l'elemento CURL con cui fare la richiesta API (Foglio Bianco)
    $poke_curl = curl_init();
    //Imposto l'URL (Destinatario)
    curl_setopt($poke_curl, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/".$_GET['poke']);
    curl_setopt($poke_curl, CURLOPT_RETURNTRANSFER,1);
    $result = json_decode(curl_exec($poke_curl),true);
    curl_close($poke_curl);
    DBManager::init() or die("Couldn't initialize DBManager <br>".mysqli_connect_error());
    $test = array();
    $test['id'] = $result['id'];
    $test['name'] = $result['name'];
    $test['height'] = $result['height'];
    $test['weight'] = $result['weight'];
    $test['type_1'] = $result['types'][0]['type']['name'];
    $test['type_2'] = null;
    if (isset($result['types'][1])) {
        $test['type_2'] = $result['types'][1]['type']['name'];
    }
    $test['hp'] = $result['stats'][0]['base_stat'];
    $test['attack'] = $result['stats'][1]['base_stat'];
    $test['defense'] = $result['stats'][2]['base_stat'];
    $test['special_attack'] = $result['stats'][3]['base_stat'];
    $test['special_defense'] = $result['stats'][4]['base_stat'];
    $test['speed'] = $result['stats'][5]['base_stat'];
    if (isset($result['sprites']['versions']['generation-v']['black-white']['animated']['front_default'])) {
        $test['img'] = $result['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
    }
    else{
    $test['img'] = $result['sprites']['front_default'];
    }
    $escaped_variables = DBManager::prevent_injection($test);
    $query_check = "SELECT * FROM Pokemon WHERE Pokemon.id =".$escaped_variables['id'];
    if (DBManager::count(DBmanager::exe($query_check)) === 0) {
        $query_insert = 
        "
        INSERT INTO Pokemon(id, name, height, weight, type_1, type_2, hp, attack, defense, special_attack, special_defense,speed, img)
        Values(".$test['id'].",'".$test['name']."',".$test['height'].",".$test['height'].",'".$test['type_1']."','".$test['type_2']."',
        ".$test['hp'].",".$test['attack'].",".$test['defense'].",".$test['special_attack'].",".$test['special_defense'].",".$test['speed'].",
        '".$test['img']."')
        ";
        DBManager::exe($query_insert);
    }
    DBManager::close();
    print_r(json_encode($test));
?>