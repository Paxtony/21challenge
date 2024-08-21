# <a id="top"></a>Day 2 - 基础语法、数据类型

## 基础语法
1. **php标签**
    **使用 ```<?php ... ?>``` 标签来定义 PHP 代码块。**
    ```<?php``` 是 PHP 脚本的标准起始标签。
    ```?>```作为结束标记，在纯php代码文件中通常会忽略结束标记。
    <br />
    PHP 脚本通常与HTML结合使用。在HTML中嵌入PHP允许动态生成网页，**如根据用户输入或数据库内容生成内容**。
2. **变量**
变量在 PHP 中以 $ 符号开头，后面跟随变量名，PHP 是 ***动态类型*** 语言，无需声明变量类型。
    ```php
    <?php
        $name = "php";
        $age = 20;
    ?>
    ```
    
    > <br/> 动态语言指在运行时确定数据类型的语言。 变量被使用前不需要类型声明，通常变量的类型是被赋值的那个值的类型。 PHP是一门动态语言，且相对于其他语言，它拥有一些独特的特性入：***动态变量***、***动态函数*** 执行等。
    <br/>
    
3. **超级全局变量**
    PHP 提供了一些超级全局变量，如 
    `$_GET`、
    `$_POST`、
    `$_SESSION`、
    `$_COOKIE`、
    `$_SERVER`等，用于获取请求相关数据。
    <br>
    > ##### <br>什么是超级全局变量?
    > 超级全局变量是 PHP 中的一种特殊变量，它们在脚本的全部作用域内始终可用。这意味着你可以在函数、类以及代码的任何部分访问这些变量，而无需使用 global 关键字。超级全局变量提供了一种方便的方式来访问与请求和环境相关的数据。
    <br>
    
    - `$_GET`：用于获取 URL 中通过 GET 方法传递的参数。它是一个关联数组，数组的键是参数名，值是参数值。
        ```php
        // URL: example.com?page=2
        $page = $_GET['page']; // $page = 2
        ```
        
    - `$_POST`：用于获取通过 POST 方法提交的表单数据。也是一个关联数组。
        ```php
        // URL: example.com?page=2
        $page = $_GET['page']; // $page = 2
        ```

    - `$_REQUEST`：包含 `$_GET`、`$_POST` 和 `$_COOKIE` 的数据。它包含所有通过这三种方式提交的数据。
        ```php
        echo $_REQUEST
        ```
        
    - `$_SESSION`：用于存储会话数据。要使用会话变量，需要先调用 `session_start()`。
        ```php
        session_start();
        $_SESSION['user'] = 'JohnDoe';
        ```
        
    - `$_COOKIE`：包含由客户端发送的 HTTP Cookies 的数据。它也是一个关联数组
        ```php
        $cookieValue = $_COOKIE['cookie_name'];
        ```
        
    - `$_FILES`：包含上传文件的信息。用于处理文件上传
        ```php
        $fileName = $_FILES['file']['name'];
        ```
        
    - `$_ENV`：包含环境变量的关联数组。通常用于在运行时获取服务器环境变量
        ```php
        $path = $_ENV['PATH'];
        ```
        
    - `$_SERVER`：包含诸如头信息、路径和脚本位置等信息。它是一个包含了很多服务器和执行环境信息的数组。
        ```php
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        ```
        
    - `$GLOBALS`：一个包含全部已定义变量的全局关联数组。变量名即为键名。类似于浏览器环境下的window
        ```php
        $someVar = 'Hello';
        echo $GLOBALS['someVar']; // Outputs: Hello
        ```

## 数据类型

1. **[php数据类型](https://www.w3school.com.cn/php/php_datatypes.asp)**
- **字符串**：使用单引号或双引号。
- **整数（Integer）**：整数字面量。
- **浮点数（Float）**：带小数点的数值。
- **布尔值（Boolean）**：true 或 false。
- **数组**：用 array() 或 [] 表示。
- **对象**：用类定义。
- **NULL**：表示无值。





<a style="margin-left:90%;"></a>[返回顶部](#top)
