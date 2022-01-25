<?php

$id = $_GET['id'];

require_once('funcs.php');
$pdo = db_conn();


$stmt = $pdo->prepare("SELECT * FROM book_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


$view = '';
if ($status == false) {
    sql_error($stmt);
}else{
  $view = $stmt->fetch();
}

// var_dump($view);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>BookMark</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">Book Data</a></div>
            </div>
        </nav>
    </header>


    <form method="post" action="update.php">
        <h1>Edit</h1>
        <input type="text" placeholder="タイトル" name="title" value=<?= $view['title'] ?>><br>
        <input type="text" placeholder="著者" name="author" value=<?= $view['author'] ?>><br>
        <input type="text" placeholder="出版社" name="publisher" value=<?= $view['publisher'] ?>><br>

        <input type="hidden" name="id" value="<?= $result['id'] ?>">

        <button type="submit" value="入力">入力</button>
    </form>



</body>

</html>
