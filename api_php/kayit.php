<?php
include "db.php";

$sunucuid = $_GET["sunucuid"];
$steamhexid = $_GET["steamhexid"];
$steam64id = $_GET["steam64id"];
$sayac = $_GET["online"];
$durum = $_GET["durum"];

 

if($_SERVER['REQUEST_METHOD'] == "POST") {

 
   
    
    $query = $db->prepare("SELECT * FROM players WHERE sunucuid = ? && steamhexid = ?");
    $param = array($sunucuid, $steamhexid);
    $query->execute($param);
    if ($query->rowCount()) {
     
    $sonuc = $db->exec("UPDATE players SET durum = $durum, online_oyuncu = $sayac WHERE sunucuid = '$sunucuid' && steamhexid = '$steamhexid' && steam64id ='$steam64id'");
      
        echo $sonuc. " güncelleme işlemi başarılı!";
    
    
    }else{
        $query = $db->prepare("INSERT INTO players SET
    sunucuid = :sunucuid,
    steamhexid = :steamhexid,
    steam64id = :steam64id,
    online_oyuncu = :online_oyuncu,
    durum = :durum");
    $insert = $query->execute(array(
          "sunucuid" => $sunucuid,
          "steamhexid" => $steamhexid,
          "steam64id" => $steam64id,
          "durum" => $durum,
          "online_oyuncu" => $sayac,
    ));
    if ( $insert ){
        $last_id = $db->lastInsertId();
        print "insert işlemi başarılı!";
        }
    }
 
}else{
  
}

?>
