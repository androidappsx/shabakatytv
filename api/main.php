<?php
$api_url = "http://tvapi.shabakaty.com/api/groups"

// تهيئة cURL لجلب البيانات
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);


if ($data && $data['api_status'] == 1) {
    echo "<h1>قنوات التلفزيون</h1>";
    echo "<ul>";
    
    
    foreach ($data['data'] as $channel) {
        echo "<li>";
        echo "<h3>" . $channel['name_ar'] . " (" . $channel['name_en'] . ")</h3>";
        echo "<img src='" . $channel['logo'] . "' alt='Logo' width='100'>";
        echo "<p><strong>رابط البث:</strong> <a href='" . $channel['link'] . "'>مشاهدة</a></p>";
        echo "</li>";
    }
    
    echo "</ul>";
} else {
    echo "<p>حدث خطأ في جلب البيانات.</p>";
}
?>