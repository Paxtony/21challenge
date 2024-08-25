<?php
// 自动加载类
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

session_start();

// 初始化书籍列表
if (!isset($_SESSION['bookList'])) {
    $_SESSION['bookList'] = [];
}

// 添加书籍
function addBook($title, $author, $year)
{
    $book = new Book($title, $author, $year);
    $_SESSION['bookList'][] = $book;
}

// 删除书籍
function removeBook($index)
{
    if (isset($_SESSION['bookList'][$index])) {
        array_splice($_SESSION['bookList'], $index, 1);
    }
}

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['year'])) {
            addBook($_POST['title'], $_POST['author'], $_POST['year']);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'remove') {
        if (isset($_POST['index'])) {
            removeBook($_POST['index']);
        }
    }
    // Redirect to the same page to clear POST data and avoid resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Book Management</h1>
    <form method="post">
        <input type="hidden" name="action" value="add">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required><br>
        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year" required><br><br>
        <button type="submit">Add Book</button>
    </form>
    <hr>
    <h2>Book List</h2>
    <ul>
        <?php foreach ($_SESSION['bookList'] as $index => $book): ?>
            <li>
                <strong><?php echo htmlspecialchars($book->title); ?></strong> by <?php echo htmlspecialchars($book->author); ?>, <?php echo htmlspecialchars($book->year); ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="action" value="remove">
                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                    <button type="submit">Remove</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>