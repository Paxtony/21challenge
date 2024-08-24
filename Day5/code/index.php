<!-- 输出 -->

<!-- echo -->
<?php
echo "Hello, World!\n";  // 输出一个字符串
echo "Json", "Docker\n";  // 输出一个字符串
echo 123;              // 输出一个数字（转换为'123'）
echo "\n";
echo true;              // 输出一个布尔值（转换为'1'）
echo "\n";
echo false;              // 输出一个布尔值（转换为''）
echo "\n";
$array = [1, 2, 3, 4, 5, 6, 7];
echo $array;              // error 
?>

<!-- print -->
<?php
print "Hello, World!\n";  // 输出一个字符串
print 123;              // 输出一个数字（转换为'123'）
print "\n";
print true;              // 输出一个布尔值（转换为'1'）
print "\n";
print false;              // 输出一个布尔值（转换为''）
print "\n";
$array = [1, 2, 3, 4, 5, 6, 7];
print $array;
?>

<!-- print_r -->
<?php
print_r("Hello, World!\n");  // 输出一个字符串
print_r("Json\n");  // 输出一个字符串
print_r(123);              // 输出一个数字（转换为'123'）
print_r("\n");
print_r(true);              // 输出一个布尔值（转换为'1'）
print_r("\n");
print_r(false);              // 输出一个布尔值（转换为''）
print_r("\n");
$array = [1, 2, 3, 4, 5, 6, 7];
print_r($array);              // error 
?>

<!-- var_dump -->
<?php
var_dump("Hello, World!\n");  // 输出一个字符串
var_dump("Json\n");  // 输出一个字符串
var_dump(123);              // 输出一个数字（转换为'123'）
var_dump("\n");
var_dump(true);              // 输出一个布尔值（转换为'1'）
var_dump("\n");
var_dump(false);              // 输出一个布尔值（转换为''）
var_dump("\n");
$array = [1, 2, 3, 4, 5, 6, 7];
var_dump($array);              // error 
?>

<!-- var_export -->
<?php
var_export("Hello, World!\n");  // 输出一个字符串
var_export("Json\n");  // 输出一个字符串
var_export(123);              // 输出一个数字（转换为'123'）
var_export("\n");
var_export(true);              // 输出一个布尔值（转换为'1'）
var_export("\n");
var_export(false);              // 输出一个布尔值（转换为''）
var_export("\n");
//处理数组
$array = [1, 2, 3, 4, 5, 6, 7];
var_export($array);
var_export("\n");

// 处理对象
class Fruit
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}

$fruit = new Fruit('apple');
var_export($fruit);
var_export("\n");

// 返回值用法
$array = array('apple', 'banana', 'cherry');
$exported = var_export($array, true);
echo $exported;
// 或将其写入文件，用于持久化的数据保存
file_put_contents('data.php', '<?php return ' . $exported . ';');
?>

<!-- sprintf -->
<?php
$formattedString = sprintf("There are %d apples", 42); // 返回字符串
echo $formattedString;
?>

<!-- printf -->
<?php
printf("There are %d apples", 1100); // 输出格式化数字作为字符串
?>

<!-- error_log -->
<?php
error_log("This is an error message."); // 记录日志信息
?>



<!-- 函数 -->

<?php
function functionName($parameter1, $parameter2)
{
    $result = $parameter1 + $parameter2;
    // 函数体
    return $result; // 可选：返回值
}
function add($a, $b)
{
    return $a + $b;
}
$result = add(2, 3); // 调用 add 函数, 返回值为 5
printf($result);
// 默认值
function greet($name = "Guest")
{
    echo "Hello, $name!";
}

greet(); // 输出: Hello, Guest!
greet("Alice"); // 输出: Hello, Alice!

// 可变参数（可变长度参数）
function sum(...$numbers)
{
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4); // 输出: 10

$message = "Hello";
$exampleClosure = function ($name) use ($message) {
    echo "$message, $name";
};

$exampleClosure("Alice"); // 输出: Hello, Alice

// 不能直接使用外部定义的变量  
$message = "Hello";
function exampleClosure($name)
{
    // echo "$message, $name"; // 会导致错误：未定义的变量 $message
};

$exampleClosure("Alice");
?>