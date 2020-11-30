<?php
// 以下のような配列に格納された数値を加算して合計値を出力するロジック
// 多次元配列に対応、phpの組み込み関数であるarray_sumと同じ関数を作る（array_sumは使わない）
$item = [
        1,2,3,
        [
            4,5,6,
            [
                10,5,30,
            ],
        ],
        'unchi',
        7,8,9,10,
        'test'
    ];
// array_sum
var_dump(array_sum($item));

// makefunction
$result = deptharray($item);
var_dump($result);

/**
 * 結果：
 * array_sum => int(40)
 * deptharray => int(100)
 */

function deptharray($array, $res = 0) {
    if (is_array($array)) {
        foreach ($array as $item) {
            if(is_array($item)) {
                $res += deptharray($item);
            } else {
                if(is_numeric($item)) {
                    $res += $item;
                } else {
                    continue;
                }
            }
        }
        return $res;
    }
    return $array;
}

// array_reverse
$item = [
    1,2,3,
    [
        4,5,6,
    ],
    7,8,9,10,
];
var_dump($item);
var_dump(reversearray($item));

function reversearray($array) {
if (is_array($array)) {
    $j=0;
    $i = count($array) - 1;
    for($i; $i>=0; $i--) {
        if(is_array($array[$i])) {
            $res[$j] = reversearray($array[$i]);
        } else {
            $res[$j] = $array[$i];
        }
        $j++;
    }
    return $res;
}
return $array;
}

/* 結果
    array(8) {
        [0]=>
        int(1)
        [1]=>
        int(2)
        [2]=>
        int(3)
        [3]=>
        array(3) {
          [0]=>
          int(4)
          [1]=>
          int(5)
          [2]=>
          int(6)
        }
        [4]=>
        int(7)
        [5]=>
        int(8)
        [6]=>
        int(9)
        [7]=>
        int(10)
      }
      array(8) {
        [0]=>
        int(10)
        [1]=>
        int(9)
        [2]=>
        int(8)
        [3]=>
        int(7)
        [4]=>
        array(3) {
          [0]=>
          int(6)
          [1]=>
          int(5)
          [2]=>
          int(4)
        }
        [5]=>
        int(3)
        [6]=>
        int(2)
        [7]=>
        int(1)
      }
*/