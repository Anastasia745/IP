<?php
    $a = $_POST["id"];
    $b = $_POST["id2"];
    $c = $_POST["id3"];
    $d = $_POST["id4"];
    $res = file_get_contents('data.json');
    $data = json_decode($res, true);

    echo $data['data_']['body']['level']['Subject'][$a]['prop']['subtype'], " ";
    echo $data['data_']['body']['level']['Subject'][$a]['name'];
    echo "\n", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['name'], " р-н";
    echo "\n", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['name'];
    echo "\n", "Адрес: ", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Houses'][$d]['adr'];
    echo "\n", "Год постройки: ", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Houses'][$d]['year'];
    echo "\n", "Количество этажей: ", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Houses'][$d]['floors'];  
?>
