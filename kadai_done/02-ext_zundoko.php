<?php

/**
 * 「ずん」「どこ」の２つをランダムに出力し続けてください
 * 「ずんずんずんずんどこ」が続いた場合、「きよし！」と出力してください。
 * おわり。
 * 
 */

$phrases        = ['ずん', 'どこ'];
$result_phrases = ['ずん', 'ずん', 'ずん', 'ずん', 'どこ'];
$phrase_stock   = [];

while ($phrase_stock !== $result_phrases) {
    $phrase_index = array_rand($phrases);
    echo $phrases[$phrase_index];

    $phrase_stock[] = $phrases[$phrase_index];

    if (count($phrase_stock) > count($result_phrases)) {
        array_shift($phrase_stock);
    }
}
echo 'きよし！';
