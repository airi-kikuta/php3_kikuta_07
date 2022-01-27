
<!-- 関数 -->

<?php
//XSS対応（ echoする場所で使用！）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}



//DB接続関数：db_conn()
function db_conn(){
    // ↓select.phpからのコピぺ
    try {
        $db_name = 'user_db';
        $db_id   = 'root';
        $db_pw   = 'root';
        $db_host = 'localhost';
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        // ↓追加
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}



//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
exit('SQLError:' . print_r($error, true));
}




//リダイレクト関数: redirect($file_name)
function redirect($file_name) {
    header('Location: index.php');
    exit();
}

