<?php
header("Content-Type: application/json");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $file_path = "api/$id.json";

    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        echo $json_data;
    } else {
        echo json_encode(["error" => "الملف غير موجود"]);
    }
} else {
    echo json_encode(["error" => "يرجى تحديد ID"]);
}
?>