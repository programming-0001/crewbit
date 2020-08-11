<?php

/**
 * 七並べをするプログラム
 *
 * トランプが48枚あります
 * 7はすべてゲーム開始時に並べられています
 *
 * 4人でプレイします(1人当たり手札は12枚)
 *
 * プレイヤーは順番にカードを並べていきます
 * 並べられるカードはすでに並べてあるカードの数字と隣り合う数字だけです
 *
 * カードが置けない場合は3回までスキップできます(4回目で失格)
 * 失格になったら手持ちのカードをすべて並べます
 *
 * ゲームを有利に進めるため、カードは7から遠い数字のものを優先的に置いていきます
 *
 * 手札がなくなったらゲームクリアです
 * クリアした順番を出力します
 *
 * 失格の場合は最下位です
 * 失格の時点で、その人の持っていたカードは全て場に置かれます
 * (ただし、7, 8, _, 10 と場にあった時に 11 は置けません)
 * もし、失格が2人以上いた場合は同率最下位です

 * 13の次に1はおけない
 */
