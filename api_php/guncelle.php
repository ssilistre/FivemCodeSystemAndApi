<?php
include "db.php";

$sunucuid = $_GET["sunucuid"];
$steamhexid = $_GET["steamhexid"];
$sayac = $_GET["online"];
$durum = $_GET["durum"];

if($_SERVER['REQUEST_METHOD'] == "POST") {
$query = $db->prepare("SELECT * FROM players WHERE sunucuid = ? && steamhexid = ?");
$param = array($sunucuid, $steamhexid);
$query->execute($param);
if ($query->rowCount()) {

	$sonuc = $db->exec("UPDATE players SET durum = $durum, online_oyuncu = $sayac WHERE sunucuid = '$sunucuid' && steamhexid = '$steamhexid' ");
    echo $sonuc. ' Oyuncunun durumu güncellendi fivemcode.com ';


}else{
	echo "Böyle bir sunucu yok";
}
}else{
}
?>
