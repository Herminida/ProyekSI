<?php function Fstrip_html_tags( $text ) //Fungsi Untuk  mengatasi teks berformat
{
$search = array ("'<script[^>]*?>.*?</script>'si",
                 "'<[/!]*?[^<>]*?>'si",   
                 "'&(quot|#34);'i",  
                 "'&(amp|#38);'i", 
                 "'&(lt|#60);'i", 
                 "'&(gt|#62);'i", 
                 "'&(nbsp|#160);'i", 
                 "'&(iexcl|#161);'i", 
                 "'&(cent|#162);'i", 
                 "'&(pound|#163);'i", 
                 "'&(copy|#169);'i", 
                 "'&#(d+);'e");                 
 
$replace = array ("", 
                 "",  
                 "\"", 
                 "&", 
                 "<", 
                 ">", 
                 " ", 
                 chr(161), 
                 chr(162), 
                 chr(163), 
                 chr(169), 
                 "chr(\1)"); 
 
$text = preg_replace($search, $replace, $text);
 
    return ($text);
}
 
function FPotongTeks( $text, $limit ) //Fungsi Untuk Memotong Panjang
{
 
$text = Fstrip_html_tags($text);
if( strlen($text)>$limit )
  {
    $text = substr( $text,0,$limit );
    $text = substr( $text,0,-(strlen(strrchr($text,' '))) ); $text="$text";
  }
 
return $text;
}//function

function buatrp($angka)
{
$jadi = "Rp " . number_format($angka,2,',','.');
return $jadi;
}

function formatTanggal($date=null)
{
//buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
'September','Oktober', 'November','Desember');
if($date == null) {
//jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
$hari = $array_hari[date('N')];
$tanggal = date ('j');
$bulan = $array_bulan[date('n')];
$tahun = date('Y');
} else {
//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
$date = strtotime($date);
$hari = $array_hari[date('N',$date)];
$tanggal = date ('j', $date);
$bulan = $array_bulan[date('n',$date)];
$tahun = date('Y',$date);
}
$formatTanggal = $tanggal ." ". $bulan ." ". $tahun;
return $formatTanggal;
}

?>