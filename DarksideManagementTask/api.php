
<?php
header("Content-Type: application/json");

require_once __DIR__ . "/dbLite.php";

try {
    $db = new DbConnect();
    $pdo = $db->connect();
    
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS notes(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        order_number TEXT,
        author TEXT,
        message TEXT,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
        )
");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    throw new Exception("Invalid JSON");
}

if (!isset($data['order'], $data['author'], $data['message'])) {
    throw new Exception("Missing fields");
}

$stmt = $pdo->prepare("
    INSERT INTO notes (order_number, author, message)
    VALUES (:order_number, :author, :message)
");

$stmt->bindParam(":order", $data['order']);
$stmt->bindParam(":author", $data['author']);
$stmt->bindParam(":message", $data['message']);

$stmt->execute();

echo json_encode([
    "status" => "success",
    "message" => "Note saved"
]);

} catch (Exception $e) {
    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}
?>