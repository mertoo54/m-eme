<?php
// Ziyaretçinin IP adresini al
$ip = $_SERVER['REMOTE_ADDR'];

// Ziyaretçinin hangi sayfaya girdiğini al
$page = $_SERVER['REQUEST_URI'];

// Veritabanına veya bir dosyaya kaydetmek için gerekli işlemleri yap
$filename = 'ziyaretci_kayit.txt';

// Dosyayı kontrol et
if (!file_exists($filename)) {
    touch($filename);
}

// Dosyayı aç ve bilgileri ekleyerek kaydet
$file = fopen($filename, 'a');

// IP, sayfa ve tarih bilgilerini hazırla
$info = "IP: $ip - Sayfa: $page - Tarih: " . date('Y-m-d H:i:s') . PHP_EOL;

// Bilgileri dosyaya yaz
fwrite($file, $info);

// Dosyayı kapat
fclose($file);

// Ziyaret sayısını artırma (örneğin, bu bilgileri daha sonra bir sayfa üzerinde görüntülemek istiyorsanız)
$visitCount = 1;

if (file_exists('visit_count.txt')) {
    $visitCount = intval(file_get_contents('visit_count.txt')) + 1;
}

file_put_contents('visit_count.txt', $visitCount);
?>
