<?php

/**
 * 1〜100までの数字を出力してください。
 * ただし、3の倍数の時はFizz、5の倍数の時はBuzz、3と5の倍数の時はFizzBuzzと出力してください。
 */

for ($i = 1; $i <= 100; $i++) {
    if ($i % 15 === 0) {
        echo 'FizzBuzz';
    } elseif ($i % 5 === 0) {
        echo 'Buzz';
    } elseif ($i % 3 === 0) {
        echo 'Fizz';
    } else {
        echo $i;
    }
    echo '<br>';
}