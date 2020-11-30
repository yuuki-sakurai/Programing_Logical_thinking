<?php
$list = range(0, 20, 1);
shuffle($list);

echo 'ソート前';
echo '<pre>';
foreach($list as $v) {
    echo $v;
    echo '<br>';
}
echo '</pre>';

$listcount = count($list);

quicksort($list, 0, $listcount-1);

echo 'ソート完了';
echo '<pre>';
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
echo '</pre>';

function quicksort(&$list, $first, $last) {
    $firstPointer = $first;
    $lastPointer = $last;
    // 枢軸値を決定する。配列の中央値
    $centerValue = $list[intval(($firstPointer + $lastPointer) / 2)];
    
    // 並び替えができなくなるまで
    do {
        // 枢軸よりも左側で値が小さい場合はポインタを進める
        // 枢軸以上の値を検索
        while ($list[$firstPointer] < $centerValue) {
            $firstPointer++;
        }

        // 枢軸よりも右側で値が大きい場合はポインタを進める
        // 枢軸未満の値を検索
        while ($list[$lastPointer] > $centerValue) {
            $lastPointer--;
        }
        // この操作で左側と右側の値を交換する場所は特定
        if($firstPointer <= $lastPointer) {
            // ポインタが逆転しない場合は交換可能
            $tmp = $list[$lastPointer];
            $list[$lastPointer] = $list[$firstPointer];
            $list[$firstPointer] = $tmp;
            // ポインタを進めて分割する位置を特定
            $firstPointer++;
            $lastPointer--;
        }
    } while($firstPointer <= $lastPointer);
    
    if($first < $lastPointer) {
        quicksort($list, $first, $lastPointer);
    }
    
    if($firstPointer < $last) {
        quicksort($list, $firstPointer, $last);
    }
}