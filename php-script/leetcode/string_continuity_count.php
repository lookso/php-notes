<?php
/**
 * Created by PhpStorm.
 * User: @kunlu
 * Date: 2019/7/25
 * Time: 7:17 AM
 */
/**
 * @param $str
 * @return int|string
 */
//function string_continuity_count($str)
//{
//    $len =strlen($str);
//    $record=[];
//    for ($i=1;$i<$len;$i++){
//        for ($j=0;$j<$len-1;$j++){
//            if($str[$i]==$str[$j]){
//                $record[$str[$i]]['count']++;
//                $record[$str[$i]][$str[$i]] = $str[$i];
//            }
//        }
//    }
//    print_r($record);
//}
//print_r(string_continuity_count("aaabbccc"));

//统计字符串中出现的字符，出现次数

echo '<pre>';
$str = 'aabbcaab';//字符串示例
echo $str . '<br/>';
$strRecord = array();//把出现过的字符记录在此数组中，如果记录有，则不记录，
for ($i = 0; $i < strlen($str); $i++) {
    $found = 0;//默认设置为没有遇到过
    foreach ((array)$strRecord as $k => $v) {
        if ($str[$i] == $v['key']) {
            $strRecord[$k]['count'] += 1;//已经遇到，count + 1；
            $found = 1;//设置已经遇到过的，标记

            continue;//如果已经遇到，不用再循环记录数组了，继续下一个字符串比较
        }
    }
    if (!$found) {
        $strRecord[] = array('key' => $str[$i], 'count' => 1);//记录没有遇到过的字符串
    }
}
print_r($strRecord);