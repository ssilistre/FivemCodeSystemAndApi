<?php
include "db.php";

$sunucuid = $_GET["sunucuid"];
$steamhexid = $_GET["steamhexid"];


$sorgu = $db->query("SELECT * FROM players WHERE sunucuid = '{$sunucuid}' && steamhexid='{$steamhexid}'");
if($sorgu->rowCount() > 0) {
 
 while($kullanici = $sorgu->fetch()) {
 $mesajdurum=$kullanici["durum"];
 $whitelist=$kullanici["whitelist"];
 if ($whitelist==1 && $mesajdurum==3) {
    $mesajdurum=1;
 }elseif ($whitelist==0 && $mesajdurum==1) {
    $mesajdurum=1;
 }
"<br/>";

if($mesajdurum==0 ){
        echo "0";
    }else if($mesajdurum==1){
        echo "1";
    }
    else if($mesajdurum==3){
        echo "Whiteliste Kayitli Degil";
    }else if($whitelist==5){
        echo '1';
    }else {
    	echo '4';
    }


 }
 
 
 
}else {
 echo "Hiç Veri Bulunamadı.";
}



?>
