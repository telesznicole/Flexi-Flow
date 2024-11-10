<?php
include 'dbconnection.php';

try {
    // 创建 PDO 连接
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 获取用户输入的搜索关键字
    $searchTerm = $_POST['searchTerm'];

    // 准备 SQL 查询
    $stmt = $pdo->prepare("
        SELECT * 
        FROM meal 
        WHERE meal_id IN (
            SELECT id 
            FROM logged_food 
            WHERE meal_name LIKE :searchTerm
        )
    ");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute();

    // 获取查询结果
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 返回 JSON 格式的数据
    header('Content-Type: application/json');
    if (count($results) > 0) {
        echo json_encode($results);
    } else {
        echo json_encode(['message' => 'No meals logged with this name.']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
}

$pdo = null;
?>
