<?php
    $res = file_get_contents('data.json');
    $data = json_decode($res, true);

    $array = array();
    $count = '0';

    for($i=0; $i<count($data['data_']['body']['level']['Subject']); $i++)
        if($i==$_POST["id"])
            for($j=0; $j<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons']); $j++)
            {
                $array[$count] = $data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['name'];
                $count++;
            }
    
    echo json_encode($array)
?>