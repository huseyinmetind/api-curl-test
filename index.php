<?php

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.collectapi.com/weather/getWeather?data.lang=tr&data.city=ankara",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: apikey 6GgPnq5zPueudXbDVgX1Lu:4ZzE3TvHk6kdntttwQL346",
            "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err)
        {
            echo "cURL Error #:" . $err;
        }
        else
        {
            $weatherData = json_decode($response,true);
            if (isset($weatherData['result'])) 
            {
                echo "<h2>Ankara Hava Durumu</h2>";
                echo "<div style='display: flex; flex-wrap: wrap;'>";

                foreach ($weatherData['result'] as $weatherInfo) 
                {
                echo "<div style='border: 0px solid #ccc; padding: 10px; margin: 10px;'>";
                echo "Tarih: " . $weatherInfo['date'] . "<br>";
                echo "Gün: " . $weatherInfo['day'] . "<br>";
                echo "Durum: " . $weatherInfo['description'] . "<br>";
                echo "Sıcaklık: " . $weatherInfo['degree'] . "°C<br>";
                echo "En Düşük Sıcaklık: " . $weatherInfo['min'] . "°C<br>";
                echo "En Yüksek Sıcaklık: " . $weatherInfo['max'] . "°C<br>";
                echo "Gece Sıcaklık: " . $weatherInfo['night'] . "°C<br>";
                echo "Nem: " . $weatherInfo['humidity'] . "%<br>";
                echo "<img src='" . $weatherInfo['icon'] . "' alt='Hava Durumu İkonu' style='width: 100px'><br><br>";
                echo "</div>";
                }   
            } else
            {
                echo "Hava durumu bilgisi alınamadı.";
            }
        }
?>
 
        
        