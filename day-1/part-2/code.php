<?php


$contents = file_get_contents(__DIR__ . "/input.txt");
$contents = explode("\n", $contents);

$letters = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
$characters = ['o', 't', 't', 'f', 'f', 's', 's', 'e', 'n'];
$sum = 0;
$final_num = [];
$count = 0;
foreach ($contents as $content) {
    $num = [];
    for ($i = 0; $i < strlen($content); $i++) {
        if (is_numeric($content[$i])) {
            $num[] = $content[$i];
        } else if (array_search($content[$i], $characters) + 1) {
            foreach ($letters as $letter) {
                if (strncmp(substr($content, $i), $letter, strlen($letter)) == 0) {
                    $num[] = array_search($letter, $letters) + 1;
                }
            }
        }
    }
    $final_num[] = $num[0] . end($num);
}

$fp = fopen(__DIR__ . '/ans.txt', 'a');

foreach ($final_num as $num) {
    fwrite($fp, $num . "\n");
    $sum += $num;
}
fclose($fp);

echo $sum;
