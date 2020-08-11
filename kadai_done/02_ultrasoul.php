<?php

/**
 * ウルトラソウル
 *
 * ウル / トラ / ソウル の3つの中からランダムに出力しつづける
 * もし、ウルトラソウルの3つが続いたら「ハイ！」と出力する
 * おわり
 */



$bz_stock = [];
$bz = ['ウル', 'トラ', 'ソウル'];
// 1.ウルトラソウルが続いたかを判定をする。
while ($bz !== $bz_stock) {
    // 2.ランダムに出力する。
    $bz_key = array_rand($bz);
    echo $bz[$bz_key];
    // 3.$stockに入れる
    $bz_stock[] = $bz[$bz_key];
    // 4.stockの要素数が4つ以上の時、stockの要素数を3つになるようにする
    if (count($bz_stock) >= 4) {
        array_shift($bz_stock);
    }
}
// 5.ハイを表示する
echo 'ハイ！';