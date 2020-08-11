<?php

/**
 * ある商品群があります
 * 商品は名前と金額
 * 
 * ある買う人がいます
 * 名前と都道府県
 * 
 * その人が商品をN個買います
 * 買う商品はランダムで購入数もランダム 1個以上
 * 
 * 送料は500円です
 * ただ、購入数が5以上の場合は1000円になります
 * また、都道府県が沖縄県と北海道はプラス1000円になります
 * 
 * 買った商品ごとの商品名、個数と、金額
 * 小計、消費税、送料（消費税かからない）、合計金額を表示してください
 *
 * 消費税が変わる事を考慮しましょう
 */

$goods  = [
    '本'      => 600,
    '棚'      => 8000,
    'ドリンク' => 150,
    'ペン'    => 100,
    'PC'      => 20000,
];
$buyers = [
    'A' => '東京都',
    'B' => '沖縄県',
];
$bought_goods_prices = [];
$shipping_fee = [];

//送料設定
$shipping_fee[] = 500;
$buyers_key = array_rand($buyers);
if ($buyers[$buyers_key] === '沖縄県' or '北海道') {
    $shipping_fee[] = 1000;
}
print_r($shipping_fee);
echo '<br/>';

//ランダム回数(>=1)、商品を買う
$random_buy_number = mt_rand(1, 1000);
for ($i = 1;  $i <= $random_buy_number; $i++) {
    $goods_key = array_rand($goods);
    $bought_goods_prices[] = $goods[$goods_key];
}
print_r($bought_goods_prices);
echo '<br/>';

//小計

//消費税追加

//合計金額