# <a id="top"></a>Day 3 - 条件控制、循环语句

## 条件控制

1. **if语句**
    ```php
    if (condition) {
        // 当条件为真时执行的代码
    }
    ```
2. **if-else语句**
    ```php
    if (condition) {
        // 当条件为真时执行的代码
    } else {
        // 当条件为假时执行的代码
    }
    ```
3. **if-elseif-else语句**
    ```php
    if (condition1) {
        // 当条件1为真时执行的代码
    } elseif (condition2) {
        // 当条件2为真时执行的代码
    } else {
        // 当前面的条件都为假时执行的代码
    }
    ```
4. **switch语句**
    ```**php**
    switch (condition) {
        case value1:
            // 当变量等于value1时执行
            break;
        case value2:
            // 当变量等于value2时执行
            break;
        default:
            // 当变量没有匹配的值时执行
            break;
    }
    ```
    
## 循环语句
1. **while 循环**
    ```php
    while (condition) {
        // 在条件为真时重复执行代码块。
    }
    ```
2. **do-while 循环**
    ```php
    while (condition) {
        // 代码块至少执行一次，其后在条件为真时重复执行。
    }
    ```
3. **for 循环**
    ```php
    for (initialization; condition; increment) {
        // 用于基于计数器的循环。
    }
    for ($i = 0, $j = 10; $i < $j; $i++, $j--) {
        // 这段代码由两个变量控制
    }
    for ($i = 0; $i < 10; $i++) {
        // 当 i < 10 时继续
    }
    ```
4. **foreach 循环**
   - 不带键值的数组遍历
        ```php
        foreach ($array as $value) {
            // 遍历数组。
            // 针对每个元素执行的代码 
        }
        ```
    - 带键值对的数组遍历
        ```php
        foreach ($array as $key => $value) {
            // 针对数组的键和值执行的代码
        }
        $person = [
            'name' => 'John',
            'age' => 30,
            'gender' => 'male'
        ];

        foreach ($person as $attr => $value) {
            echo "$attr: $value\n";
        }
        // 输出：
        // name: John
        // age: 30
        // gender: male
        ```
    - 使用 `foreach` 时的注意事项
        ```php
        1.副本与引用： 默认情况下，foreach 使用的是数组元素的副本，而不是引用。因此，在循环中对元素值的修改不会影响到原始数组，除非使用引用方式。
        
        2.引用传递： 可以通过引用来修改数组元素的值。在 foreach 中用 & 符号将 $value 变为引用，从而直接改变数组中的值。
        foreach ($array as &$value) {
            $value = $value * 2;
        }
        
        3.未定义行为： 如果在 foreach 中添加或删除数组元素，可能会导致未定义的行为。应该避免在循环中对数组结构的直接修改。
        ```

## 常量
1. **定义一个常量**
    ```php
    <?php 
        define("CONSTANT", 50);// 
        
        echo CONSTANT;
        echo constant("CONSTANT"); // 跟前一行相同
    ?>
    ```
2. **constant()函数**
    ```php
    define('MY_CONSTANT', 'Hello, World!');
    $constantName = 'MY_CONSTANT';
    echo constant($constantName); // 输出：Hello, World!
    ```
    > constant 的使用场景
    动态访问常量：在程序中需要根据某些条件访问不同的常量
    命名空间：在命名空间环境下，访问常量时需要提供完整的命名空间路径，如果使用动态名称，constant() 可以简化这类操作。
    避免硬编码常量名称：不需要在代码中硬编码常量名称
    
3. **常量的特性**
    - 常量前不需要和变量一样加$
    - 只能使用define()函数定义
    - 可以在任何地方定义和访问常量，而不考虑变量作用域规则
    - 常量是唯一的，不能多次定义
    - 
4. **魔术常量**
    PHP提供了大量预定义常量。魔法常数会根据它们的使用位置而改变。
    - **`__LINE__`**：文件的当前行号。
    - **`__FILE__`**：文件的完整路径和文件名。如果在include中使用，则返回包含文件的名称。从PHP 4.0.2开始，__ FILE__始终包含绝对路径，而在旧版本中，它在某些情况下包含相对路径。
    - **`__FUNCTION__`**：函数名称。（在PHP 4.3.0中添加）从PHP 5开始，此常量返回声明的函数名称（区分大小写）。在PHP 4中，它的值总是小写的。
    - **`__CLASS__`**：类名称。（在PHP 4.3.0中添加）从PHP 5开始，此常量返回声明的类名（区分大小写）。在PHP 4中，它的值总是小写的。
    - **`__METHOD__`**：类方法名称。（在PHP 5.0.0中添加）方法名称在声明时返回（区分大小写）。


