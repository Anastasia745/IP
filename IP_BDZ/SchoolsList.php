<?php

    $n = $_POST["id"];
    $t = $_POST["id2"];
    $res = file_get_contents('data.json');
    $data = json_decode($res, true);
    
    $array3 = array();
    $count = '0';

    for($i=0; $i<count($data['data_']['body']['level']['Subject']); $i++)
        if($i==$n)
            for($j=0; $j<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons']); $j++)
                if($j==$t)
                    for($k=0; $k<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['level']['Cities']); $k++)
                        if($k==$_POST["id3"])
                            for($p=0; $p<count($data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['level']['Cities'][$k]['level']['Schools']); $p++)
                            {
                                $array3[$count] = $data['data_']['body']['level']['Subject'][$i]['level']['Rayons'][$j]['level']['Cities'][$k]['level']['Schools'][$p]['name'];
                                $count++;
                            }
                            
    echo json_encode($array3)
?>
