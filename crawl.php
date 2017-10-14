<html>
<head>
<title> Rahmat's file.idfl.me Crawler </title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

h1 {
	text-align: center;
	color: #000;
}
</style>
</head>

<?php
// function to get webpage title
ini_set('max_execution_time', 300);
$a=$_GET['a'];
$z=$a+19;
$b=array();
function getWeb($b,$a,$z) {
	$hasil=array();
	for ($i=$a; $i<=$z; $i++)
	{
		$hasil[$i] = 'http://file.idfl.me/file/'.$i;
	}
	return $hasil;
}

function getTitle($url) {
    $page = file_get_contents($url);
    $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
    return $title;
}

function getOwner($url) {
   $page = file_get_contents($url);  
  
	$string_awal   = '<td>';  
	$string_akhir   = '</td>';  
  
	$pos_awal = strrpos($page, $string_awal)+4;  
	$pos_akhir = strrpos($page, $string_akhir);  
	$pos_ambil = $pos_akhir-$pos_awal;

	$owner = substr($page, $pos_awal, $pos_ambil);
  
	return $owner;
}
$x=getWeb($b,$a,$z);
// get web page title
echo '<h1>File nomor '.$a.' sampai '.$z.'</h1>';
echo '<table>';
echo '	<tr>
    		<th>File Name</th>
    		<th>Owner</th>
  		</tr>';
	for ($i=$a;$i<=$z;$i++){
		echo '<tr>';
		echo '<td><a href="'.$x[$i]. '">'. getTitle($x[$i]).'</a></td>' ;
		echo '<td>'. getOwner($x[$i]).'</td>' ;
		echo '</tr>';
}
$prev=$a-20;
$next=$a+20;
echo ' <a href="crawl.php?a='.$prev.'">Sebelum</a>';
echo '-----<a href="index.php?">Home</a>-----';
echo ' <a href="crawl.php?a='.$next.'">Sesudah</a>';
?>
</html>
