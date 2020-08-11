<?php

/**
 * プレイヤーはN人(N>1)
 * トランプ52枚を順番に2枚ずつめくる
 * 同じ数字だったらもう一度めくる
 * めくるカードが無くなったら終了
 * 違う数字だったら次の人
 * N人目の次の人は1人目
 * J,Q,kは11,12,13でいい
 * 2枚めくって同じ数字だったらめくる対象から除外する
 * 各プレイヤーが取った組の数を出力する
 *
 * 神経衰弱です
 */

$players = ['A', 'B', 'C'];

$suits      = ['spade', 'heart', 'club', 'diamond'];
$trumpcards = [];
for ($number = 1; $number <= 13; $number++) {
    foreach ($suits as $suit) {
        $trumpcards[] = [
            'suit'   => $suit,
            'number' => $number,
        ];
     }
}

$player_scores = [];
foreach ($players as $player) {
    $player_scores[$player] = 0;
}

while (count($trumpcards) > 0) {
    foreach ($players as $player) {
        while (count($trumpcards) > 0) {
            $trumpcard_indexes = array_rand($trumpcards, 2);

            if ($trumpcards[$trumpcard_indexes[0]]['number'] === $trumpcards[$trumpcard_indexes[1]]['number']) { 
                $player_scores[$player]++;
                unset($trumpcards[$trumpcard_indexes[0]], $trumpcards[$trumpcard_indexes[1]]);
            } else {
                break;
            }
        }
    }
}

foreach ($player_scores as $player => $score) {
    echo "{$player} : {$score}組<br>";
}
