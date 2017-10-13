<html>
<title> Rahmat's file.idfl.me Crawler </title>
	
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
$x=getWeb($b,$a,$z);
// get web page title
echo 'File nomor '.$a.' sampai '.$z;
echo '<ul>';
for ($i=$a;$i<=$z;$i++){
	echo '<li><a href="'.$x[$i]. '">'. getTitle($x[$i]).'</a></li>' ;
}
echo '</ul>';
// Output:
// Title: PHP 5 Tutorial
include 'footer.php';
?>
	
</html>
