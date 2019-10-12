<?php

$name=12&&$age=14;
//echo $name;

$data=[1,2,3,4,5];
$keyList=[3,4,5,6,7];
$testData = filterParams($data,$keyList);
print_r($testData);

if ($a = 100 && $b = 200) {
    var_dump($a, $b);
}
$a=100 && $b = 200;
echo $b;
function filterParams(array $data, array $keyList)
{
    $newData = [];
    if (empty($data) || empty($keyList)) {
        return $newData;
    }
    foreach ($keyList as $key) {

        isset($data[$key]) && $newData[$key] = $data[$key];
    }


    return $newData;
}
echo "\n\r";
$url = "http://www.php.cn/?name=ja+";

echo $url;
echo "\n\r";
$strurl =  urlencode($url);
echo $strurl;
echo "\n\r";
echo urldecode($strurl);
echo "\n\r";

echo "------------\n";

echo urlencode("jia+");
echo "\n\r";
