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
    echo "\n", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Schools'][$d]['name'];
    echo "\nФилиалы:";
    for($f=0; $f<count($data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Schools'][$d]['filials']); $f++)
    {    
        echo "\n\t", $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Schools'][$d]['filials'][$f]['number'];
        echo "\n\tАдрес: ";
        echo $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Schools'][$d]['filials'][$f]['adr'];
        echo "\n\tКоординаты: ";
        echo $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Schools'][$d]['filials'][$f]['xy'];
        echo "\n\tВремя работы: ";
        echo $data['data_']['body']['level']['Subject'][$a]['level']['Rayons'][$b]['level']['Cities'][$c]['level']['Schools'][$d]['filials'][$f]['sch'], "\n";
    }
    
    /*for($i=0; $i<count($data['data_']['body']['level']['Subject']); $i++)
        if($i==$a)
            for($j=0; $j<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons']); $j++)
                if($j==$b)
                    for($k=0; $k<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['level']['Cities']); $k++)
                        if($k==$c)*/
?>
