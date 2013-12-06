yedTarih
========

Php’de sıkça tarih verileriyle uğraştığım(ız) için bi’kaç tane tarih fonksiyonum vardı. Hepsini bi’sınıfta toplayayım dedim ve ortaya bu sınıf çıktı

Adını yedTarih koyduğum sınıfın iki temel özelliği var;

Tarih Döndürmek <br/>
Tarih Formatlamak <br />

require_once 'yedTarih.php';

yedTarih tarih verisi alma
========

$tarih=new yedTarih();

echo $tarih->ver('tarih'); #Formatsız tarih. Örn: 2010-12-29 19:38:41

echo $tarih->ver('yil'); #Yıl. Örn: 2010

echo $tarih->ver('ay'); #Ay. Örn: Aralık

echo $tarih->ver('gun'); #Gün. Örn: Pazartesi

echo $tarih->ver('saat'); #Saat. Örn:15

echo $tarih->ver('dakika'); #Dakika. Örn:23

yedTarih tarih verisini formatlama

require_once 'yedTarih.php';
$tarih=new yedTarih();
========
$buTarih=$tarih->ver('tarih');
echo $tarih->formatla($buTarih,'uzun'); #Örn: 20 Aralık 2010
echo $tarih->formatla($buTarih,'ideal'); #Örn: 20 Aralık '10
echo $tarih->formatla($buTarih,'kisa'); #Örn: 20.12.'10
echo $tarih->formatla($buTarih,'noktali'); #Örn: 20.12.2010 , Serpito'nun önerisi üzerine.
echo $tarih->formatla($buTarih,'saatli'); #Örn: 29 Mayıs 2011, 13:00
echo $tarih->formatla($buTarih,'saatliGunlu'); #Örn: 30 Mayıs 2013, Perşembe 10:35
echo $tarih->formatla($buTarih,'gun'); #Örn: Perşembe
