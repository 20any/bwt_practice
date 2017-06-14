<?php 

/** 
 * @author nons@studio38.ru 
 *  
 * парсер погоды с сайта Гисметео 
 *  
 */ 

//массив с данными по времени суток 
$hour = array("night", "morning", "day", "evening"); 

//адрес страницы с погодой 
$url = 'http://www.gismeteo.ru/city/weekly/4746/';  

//чистим таблицу с погодой 
mysql_query("TRUNCATE TABLE `".$prefix."weather_forecast`"); 

//получаем погоду 
$fp=fopen($url,"r");  
if(!$fp) exit(0);  

$content="";  
while(!feof($fp)) { $content .= fgets($fp,512); }  
fclose($fp);      

//парсим с помощью регулярных выражений 
if(preg_match_all('#<div class="wbfull">(.*?)</div>#s', $content, $result_html)){          

    foreach($result_html***91;0***93; as $element){ 

        // удалим мусор, комментарии 
        $element = preg_replace("/<!--.*-->/","",$element); 
         
        /** Дата **/         
        //Local: 2010-07-09 15:00:00 
        //<th title="Прогноз от 2010-07-08 18:00:00, UTC: 2010-07-09 18:00:00, Local: 2010-07-10 3:00:00"> 
         
         if(preg_match_all('/Local: (.*)">/i', $element, $result0)){  
              
            $date = $result0***91;1***93;***91;0***93;; $date = date("Y-m-d",strtotime($date));             
                     
        }                 
         
        /** Иконки **/     
        $icon_src = array();         
  
        if(preg_match_all('/<td class="clicon">.*<\\/td>/i', $element, $result1)){            
            if(preg_match_all('#<img class="png" src="http://i.gismeteo.com/static/images/icons/new/(.*)" alt="">#i', $element, $icon)){     
               
                //массив с иконками 
                for($i = 0; $i < 4; $i++){ 
                    if (isset($icon***91;1***93;***91;$i***93;)) $icon_item = $icon***91;1***93;***91;$i***93;; else $icon_item = "Нет данных";
                     
                    $icon_src***91;***93; = $icon_item; 
                     
                    //проверяем файл на существование и если нет, то загружаем его 
                    //$sitedir = директория сайта 
                    if (!file_exists($sitedir."/i/weather/".$icon_item)){ 
                         
                        $fileName=$sitedir."/i/weather/".$icon_item;// Имя файла, который будет сохранен на данном сервере 
                        $host="http://i.gismeteo.com/static/images/icons/new/".$icon_item;//путь к файлу на сервере, с которого происходит закачка                
                        $fp=fopen($fileName,"w"); 
                        fclose($fp); 
                        $ch=curl_init(); 
                        curl_setopt($ch, CURLOPT_URL, $host); 
                        $fp=fopen($fileName,"w+"); 
                        curl_setopt($ch, CURLOPT_FILE, $fp); 
                        curl_setopt($ch, CURLOPT_REFERER, $host); 
                        curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
                        curl_exec ($ch); 
                        curl_close ($ch); 
                        fclose ($fp); 
                    }                                                                                     
                }                                                         
            }                         
        } 

        /** Облачность **/ 
        $overcast = array(); 
        if(preg_match_all('/<td class="cltext">.*<\\/td>/i', $element, $result2)){ 
            foreach($result2***91;0***93; as $overcast_item){ 
                $overcast_item = strip_tags($overcast_item); 
                $overcast***91;***93; = $overcast_item;                                                     
            } 
        } 
                 
        /** Tемпература воздуха, °C **/ 
        $temperature = array(); 
        if(preg_match_all('/<td class="temp">.*<\\/td>/i', $element, $result3)){ 
            foreach($result3***91;0***93; as $temperature_item){ 
                $temperature_item = strip_tags($temperature_item); 
                if (!strpos($temperature_item,"°C")) 
                    $temperature***91;***93; = $temperature_item;                                     
            } 
        } 
         
        /** Атм. давл., мм рт.ст. **/ 
        $pressure = array(); 
                 
        if(preg_match_all('/<td>.*<\\/td>/i', $element, $result4)){            
            foreach($result4***91;0***93; as $pressure_item){ 
                $pressure_item = strip_tags($pressure_item); $pressure_item = intval($pressure_item);                 
                if (strlen($pressure_item) == 3) 
                    $pressure***91;***93; = $pressure_item;                                     
            } 
        } 
                 
        /** Ветер, м/сек **/ 
        $wind = array(); 
        $wind***91;***93; = ""; //пустое значение, ок 
        $wind_val=""; 
         
            
             
        if(preg_match_all('/<dl class="wind">.*<\\/dl>/i', $element, $result5)){              
               foreach($result5***91;0***93; as $wind_item){ 
                   
                   if (preg_match('/title="(.*)"/i',$wind_item,$wind_direction)){ 
                       $wind_val = $wind_direction***91;1***93; . "<br />" . preg_replace("/***91;^0-9***93;+/","",strip_tags($wind_item))." м/с";     
                   } 
                   if (!empty($wind_val)) 
                    $wind***91;***93; = $wind_val;     
                                 
            }                                
        } 
         
        /** Влажность воздуха,% **/ 
        $humidity = array(); 
        if(preg_match_all('/<td>.*<\\/td>/i', $element, $result6)){ 
            foreach($result6***91;0***93; as $humidity_item){ 
                $humidity_item = strip_tags($humidity_item);   
                if (strlen($humidity_item) == 2) 
                    $humidity***91;***93; = $humidity_item;                                     
            } 
        } 
         
        /** Комфорт, °C **/         
        $comfort = array(); 
        if(preg_match_all('/<td>.*<\\/td>/i', $element, $result7)){ 
            foreach($result7***91;0***93; as $comfort_item){ 
                $comfort_item = strip_tags($comfort_item); 
                if (strpos($comfort_item,"&deg;")) 
                    $comfort***91;***93; = $comfort_item;                                     
            } 
        } 
         
        //заносим полученные данные в БД     
        for ($i = 0; $i < 4; $i++){ 
            $sql = "INSERT INTO `".$prefix."weather_forecast` (`date`,`hour`,`icon_src`,`overcast`,`temperature`,`pressure`,`wind`,`humidity`,`comfort`,`last_update`) VALUES ('".$date."','".$hour***91;$i***93;."','".$icon_src***91;$i***93;."','".$overcast***91;$i***93;."','".$temperature***91;$i***93;."','".$pressure***91;$i***93;."','".$wind***91;$i+1***93;."','".$humidity***91;$i***93;."','".$comfort***91;$i***93;."', '".date("Y-m-d")."')";             
            mysql_query($sql);     
        }             
                                 
    }     
             
} 

?>