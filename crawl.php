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
    background-color: #4CAF50;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

h1 {
	text-align: center;
	color: #000;
}

div.nav {
	text-align: center;
	padding: 10px;
}

.button {
    background-color: #4CAF50;
    border: 1px solid #dddddd;
    border-radius: 10px;
    color: white;
    padding: 12px ;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 20px 10px;
    cursor: pointer;
}

.button:hover {
    background-color: #45a049;	
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
echo '<div><table>';
echo '	<tr>
			<th>Nomor</th>
    		<th>File Name</th>
    		<th>Owner</th>
  		</tr>';
	for ($i=$a;$i<=$z;$i++){
		$temp = getTitle($x[$i];
		echo '<tr>';
		echo '<td>'.$i.'</td>' ;
        if (strpos ($temp,"File not found :(") !==false{
            echo '<td>To Be Updated</td>' ;
            echo '<td>Not Found</td>' ;
        }
		else {
            echo '<td><a href="'.$x[$i]. '">'.$temp.'</a></td>' ;
		    echo '<td>'. getOwner($x[$i]).'</a></td>' ;
		echo '</tr>';
}
echo '</table></div>';

$prev=$a-20;
$next=$a+20;
echo ' <div class="nav"><a href="crawl.php?a='.$prev.'" class="button">Sebelum</a>';
echo ' <a href="index.php?" class="button">Home</a>';
echo ' <a href="crawl.php?a='.$next.'" class="button">Sesudah</a></div>';
?>
</html>
