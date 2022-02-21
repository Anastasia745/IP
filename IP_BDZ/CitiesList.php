<?php
    $res = file_get_contents('data.json');
    $data = json_decode($res, true);
    $n = $_POST["id"];
    $array2 = array();
    $count = '0';

    for($i=0; $i<count($data['data_']['body']['level']['Subject']); $i++)
        if($i==$n)
            for($j=0; $j<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons']); $j++)
                if($j==$_POST["id2"])
                    for($k=0; $k<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['level']['Cities']); $k++)
                    {
                        $array2[$count] = $data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['level']['Cities'][$k]['name'];
                        $count++;
                    }
                    
    echo json_encode($array2)
?>