<?
           /**
            * Tarih verisi elde etmeyi ve formatlamayý saðlar
            * @author yedincisenol | Ýbrahim Þ. Örencik
            * @version 1.4.0
            * @sonGelistirme 05 Aralýk 2013
            */
           class yedTarih{
               var $gunler=array(
               'tr_TR'=>array(0=>'Pazar',1=>'Pazartesi',2=>'Salý',3=>'Çarþamba',4=>'Perþembe',5=>'Cuma',6=>'Cumartesi'),
               'en_US'=>array(0=>'Sunday',1=>'Monday',2=>'Tuesday',3=>'Wednesday',4=>'Thursday',5=>'Friday',6=>'Saturday')
			   );
               var $kisaAylar=array(
               'tr_TR'=>array(01=>'Ock',02=>'Þubt',03=>'Mart',04=>'Nsn',05=>'Mys',06=>'Hzrn',07=>'Tmmz',08=>'Aðsts',9=>'Eyl',10=>'Ekm',11=>'Kasým',12=>'Arlk'),
               'en_US'=>array(01=>'Jan',02=>'Feb',03=>'Mar',04=>'Apr',05=>'May',06=>'Jun',07=>'Jul',08=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec')
               );
               
               var $aylar=array(
               'tr_TR'=>array(01=>'Ocak',02=>'Þubat',03=>'Mart',04=>'Nisan',05=>'Mayýs',06=>'Haziran',07=>'Temmuz',08=>'Aðustos',09=>'Eylül',10=>'Ekim',11=>'Kasým',12=>'Aralýk'),
               'en_US'=>array(01=>'January',02=>'February',03=>'March',04=>'April',05=>'May',06=>'June',07=>'July',08=>'August',09=>'September',10=>'October',11=>'November',12=>'December')
               );
               
			   var $dil='tr_TR';
              
               /**
                * Yeni tarih verisi döndürür.
                * $donem alabileceði deðerler: gun,ay,yil,saat,dakika,tarih
                * @return string
                */
			function ver($donem='tarih'){
                   $tarih['tarih']=date("Y-m-d H:i:s"); #Formatsýz tarih. Örn: 2010-12-29 19:38:41
                   $tarih['yil']=date('Y'); #Yýl. Örn: 2010
                   $tarih['ay']=$this->aylar[$this->dil][date('n')]; #Ay Adý. Örn: Ocak
                   $tarih['gun']=$this->gunler[$this->dil][date('w')]; #Gün adý. Örn: Pazartesi
                   $tarih['saat']=date('G'); #Saat. Örn: 16
                   $tarih['dakika']=date('i'); #Dakika. Örn:59
                  
                   return $tarih[$donem];
               }
              
               /**
                * Gönderilen tarih verisini formatlar.
                * $tarih verisi formatsýz olmalý: Örn: 2010-12-29 19:38:41
                * $format deðiþkenine verilebilecek deðerler: uzun,ideal,kisa,noktali,rss
                * @return string
                */
			function formatla($tarih,$format='ideal'){
                   
                   $gun        = (int)substr($tarih,8,2); 
                   $ay         = (int)substr($tarih,5,3);
                   $yil        = substr($tarih,0,4);
                   $saat       = substr($tarih,11,2);
                   $dakika     = substr($tarih,14,2);
                   $gunIndex   = (int)date('w',mktime($saat,$dakika,'0',$ay,$gun,$yil));
                   $gunAdi     = $this->gunler[$this->dil][$gunIndex];
                  
                   $yeniTarih['uzun']=$gun.' '.$this->aylar[$this->dil][$ay].' '.$yil; #Örn: 20 Aralýk 2010
                   $yeniTarih['ideal']=$gun.' '.$this->kisaAylar[$this->dil][$ay]." '".substr($yil,2,2); #Örn: 20 Arlk '10
                   $yeniTarih['idealYilYok']=$gun.' '.$this->kisaAylar[$this->dil][$ay]; #Örn: 20 Arlk
                   $yeniTarih['kisa']=$gun.'.'.$ay.'.'."'".substr($yil,2,2); #Örn: 20.12.'10
                   $yeniTarih['noktali']=$gun.'.'.$ay.'.'.$yil; #Örn: 20.12.2010 , serpito'unun önerisi üzerine, v1.1 itibariyle
                   $yeniTarih['saatli']=$gun.' '.$this->aylar[$this->dil][$ay].' '.$yil.', '.$saat.':'.$dakika;
                   $yeniTarih['saatliGunlu']=$gun.' '.$this->aylar[$this->dil][$ay].' '.$yil.', '. $gunAdi.'  '.$saat.':'.$dakika;
                   $yeniTarih['gun']=$this->gunler[$this->dil][date('N',strtotime($tarih))];
           
	               if($tarih=='0000-00-00') return false;
	                   return $yeniTarih[$format];
	               }
           }
?>

