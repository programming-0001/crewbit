<?php

/**
 * エナジードリンク 150円
 * 炭酸飲料水 140円
 * スポーツドリンク 130円
 * 缶コーヒー 120円
 * ミネラルウォーター 110円
 *
 * 投入できるのは1000円札、500円硬貨、100円硬貨、50円硬貨、10円硬貨のみ
 * 10000円札、5000円札、2000円札、5円硬貨、1円硬貨は使用不可
 * 紙幣、硬貨の最大数はX枚とする(X > 0)
 *
 * ランダムで飲料を購入する
 * ただし、飲料の合計金額がNを超えてはならない
 * 各飲料の在庫数はY本とする(Y> 0)
 *
 * 任意の金額N円(1000,500,100,50,10円(の組み合わせで成立する額))を
 * 1回のみ自販機に投入して、
 * ランダムに何か買ってゆく。
 * それが何本でもいいし、何を買ってもいい。
 * まだ何か買えたとしても、どこで打ち切るかもランダム。
 *
 * 購入したら投入金額、各飲料の本数とその合計金額、全飲料の合計金額、おつりを表示する
 */

$drinks = [
    'エナジードリンク'  => 150,
    '炭酸飲料水'        => 140,
    'スポーツドリンク'  => 130,
    '缶コーヒー'        => 120,
    'ミネラルウォーター' => 110,
];
$property_monies = [1000, 500, 100, 50, 10];
$drink_names = array_keys($drinks);
$counts_of_bought_each_of_drinks = [];
foreach ($drink_names as $drink_name) {
    $counts_of_bought_each_of_drinks[$drink_name] = 0;
}
$putin_monies         = [];
$bought_drinks_total_price = 0;
////------------

// ランダムにお金を選択し、投入
$number_of_times_pick_monies = mt_rand(1, 100);
for ($i = 1;  $i <= $number_of_times_pick_monies; $i++) {
    $property_money_index = array_rand($property_monies);
    $putin_monies[] = $property_monies[$property_money_index];
}
// ランダム回数、飲料購入繰り返し <= 金額上限
//毎回、それぞれのドリンクを買えるかどうか判断し、買えるものを、買えるものリストの中に入れてそこから購入
$number_of_times_buy_drinks = mt_rand(1, 100);
for ($i = 1;  $i <= $number_of_times_buy_drinks; $i++) {
  //買えるものリストを作る（毎回リセット）
  $buyable_drinks = [];
  //5つのドリンクの名前と価格を取り出す
    foreach ($drinks as $drink_name => $drink_price) {
        //それぞれのドリンク価格　<=　残金　であれば購入可能
        if ($drink_price <= array_sum($putin_monies) - $bought_drinks_total_price) {
            //買えるドリンクを抽出し、 買えるものリストに入れていく
            $buyable_drinks[$drink_name] = $drink_price;
        }
    }
    //買えるものがリストの中ある場合
    if (!empty($buyable_drinks)) {
        //ランダムにkeyを抽出（購入）
        $chose_drink_name = array_rand($buyable_drinks);
        //合計金額
        // adv: 変数名がおかしい、合計金額が入ってない
        $bought_drinks_total_price += $buyable_drinks[$chose_drink_name];
        //合計本数
        $counts_of_bought_each_of_drinks[$chose_drink_name]++;
    } else {
        break;
    }
}
$each_of_drinks_total_prices = [];
foreach ($drinks as $drink_name => $drink_price) {
    $each_of_drinks_total_prices[$drink_name] = $drink_price * $counts_of_bought_each_of_drinks[$drink_name];
}
?>

<!-- 結果抽出 -->
<!DOCTYPE html>
<html>
  <table border="1">
    <body>
      <tr>
        <th>
          <p>投入金額</p>
        </th>
        <td>
          <?php echo array_sum($putin_monies) ?>
        </td>
        <th>
          <p>円</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>各飲料の購入本数</p>
        </th>
        <td>
          <?php foreach ($counts_of_bought_each_of_drinks as $drink_name => $count_of_bought_drink) : ?>
            <?php echo $drink_name ?>
            :
            <?php echo $count_of_bought_drink ?>
            <br>
          <?php endforeach ?>
        </td>
        <th>
          <p>本</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>各飲料の合計金額</p>
        </th>
        <td>
          <?php foreach ($each_of_drinks_total_prices as $drink_name => $bought_drink_price) : ?>
            <?php echo $drink_name ?>
            :
            <?php echo $bought_drink_price ?>
            <br>
          <?php endforeach ?>
        </td>
      　<th>
          <p>円</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>全飲料合計金額</p>
        </th>
        <td>
          <?php echo $bought_drinks_total_price ?>
        </td>
        <th>
          <p>円</p>
        </th>
      </tr>
      <tr>
        <th>
          <p>おつり</p>
        </th>
        <td>
          <?php echo array_sum($putin_monies) - $bought_drinks_total_price ?>
        </td>
        <th>
          <p>円</p>
        </th>
      </tr>
    </body>
  </table>
</html>
