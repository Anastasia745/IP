<meta charset="utf-8">
<?php
    $xml = simplexml_load_file('portfolio.xml');

    $stack[] = $var;
    for ($i=0; $i<count($xml->projects->project); $i++)
    {
        $var[$i] = array();
        for ($j=0; $j<count($xml->projects->project[$i]->authors->author); $j++)
            array_push($var[$i], (string)($xml->projects->project[$i]->authors->author[$j]));
    }

    $bracket_start = "[";
    file_put_contents('portfolio.json', $bracket_start, FILE_APPEND);
    for ($i=0; $i<count($xml->projects->project); $i++)
    {
        $arr = array('name'=>(string)($xml->projects->project[$i]->title),
        'id'=>(string)($xml->projects->project[$i]['id']),
        'year'=>(string)($xml->projects->project[$i]['year']),
        'authors'=>$var[$i],
        );
        $comma = ",";
        $jsonData = json_encode($arr);
        if (!(file_get_contents('portfolio.json')=='['))
            file_put_contents('portfolio.json', $comma, FILE_APPEND);
        file_put_contents('portfolio.json', $jsonData, FILE_APPEND);
    }
    $bracket_end = "]";
    file_put_contents('portfolio.json', $bracket_end, FILE_APPEND);
    
    /*echo '<pre>';
    $res = file_get_contents('t.json');
    print_r($res);
    echo "<br>";*/
    
    /*$data = json_decode($res, true);
    for($i=0; $i<count($data); $i++)
    {
        print_r($data[$i]['id']);
        echo '<br>';
    }*/
?>
