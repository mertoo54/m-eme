$ip_adresi = $_SERVER['REMOTE_ADDR'];
    if ( !file_exists("ip_bilgileri.txt")) {
        touch("ip_bilgileri.txt");
        $dosya = @fopen("ip_bilgileri.txt", "+r");
        @fclose($dosya);
        header( 'refresh: 1; url=/' );
    }
    else {
        $dosya = @fopen("ip_bilgileri.txt", "a");
        $deger = "#######################". "\r\n" . "Tarih : " . date('dd/mm/YY - H:i') . "\r\n" . "Ziyaretci IP Adresi :" . "\r\n" . $ip_adresi . "\r\n". "#######################" . "\r\n";
        @fwrite($dosya, $deger);
        @fclose($dosya);
    }