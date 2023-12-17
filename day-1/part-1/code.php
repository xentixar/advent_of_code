<?php


$contents = file_get_contents(__DIR__ . "/input.txt");
$contents = explode("\n", $contents);

$sum = 0;
$final_num = [];
foreach ($contents as $content) {
    $num = [];
    for ($i = 0; $i < strlen($content); $i++) {
        if (is_numeric($content[$i])) {
            $num[] = $content[$i];
        }
    }

    $final_num[] = $num[0] . end($num);
}

foreach ($final_num as $num) {
    $sum += $num;
}

echo $sum;
