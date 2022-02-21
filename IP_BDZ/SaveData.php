<?php
    $text = $_POST["text"];
    $file = "text.txt";

    $current = file_get_contents($file);
    $current .= $text;
    $current .= "\n\n\n";
    file_put_contents($file, $current);
?>