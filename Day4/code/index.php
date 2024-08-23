<!-- 字符串 -->
<?php
$x = "Hello world!";
echo $x;
echo "<br>";
$x = 'Hello world!';
echo $x;
?>

<!-- 创建一个数组 -->
<?php
$array = array('a', 'b', 'c');
$array = ['a', 'b', 'c'];
echo $array[0];

$array[] = 'd'; // 向数组末尾添加一个元素
$array['key'] = 'value'; // 添加键值对

echo $array['key'];

unset($array['key']); // 删除索引key处的元素

print_r($array);

echo count($array);

$array1 = ['a', 'b'];
$array2 = ['c', 'd'];
$result = array_merge($array1, $array2);

print_r($result);
?>

<!-- 算数运算符 -->
<?php
$x = 17;
$y = 8;
echo ($x + $y); // 输出 25
echo ($x - $y); // 输出 9
echo ($x * $y); // 输出 136
echo ($x / $y); // 输出 2.125
echo ($x % $y); // 输出 1
?>

<!-- 字符串运算符 -->
<?php
$a = "Hello";
$b = $a . " world!";
echo $b; // 输出 Hello world!

$x = "Hello";
$x .= " world!";
echo $x; // 输出 Hello world!
?>

<!-- 递增/递减运算符 -->
<?php
$x = 1;
echo ++$x; // 输出 2

$y = 1;
echo $y++; // 输出 1

$z = 1;
echo --$z; // 输出 0

$i = 1;
echo $i--; // 输出 1
?>

<!-- 比较运算符 -->
<?php
$x = 17;
$y = "17";

var_dump($x == $y);
echo "<br>";
var_dump($x === $y);
echo "<br>";
var_dump($x != $y);
echo "<br>";
var_dump($x !== $y);
echo "<br>";

$a = 17;
$b = 8;

var_dump($a > $b);
echo "<br>";
var_dump($a < $b);
?>

<!-- **数组运算符**，**用于比较数组** -->
<?php
$x = array("a" => "apple", "b" => "banana");
$y = array("c" => "orange", "d" => "peach");
$z = $x + $y; // $x 与 $y 的联合
var_dump($z);
var_dump($x == $y);
var_dump($x === $y);
var_dump($x != $y);
var_dump($x <> $y);
var_dump($x !== $y);
?>