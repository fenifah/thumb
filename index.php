<?php
include "thumbnail.inc.php";
function createThumbs( $pathToImages, $pathToThumbs, $maxWidth = 120, $maxHeight = 120, $quality=100 )
{
//echo "masuk createThumbs";
//include_once(_DOC_ROOT . "grab/thumbnail.inc.php");
if( is_file($pathToImages) )
{
$thumb = new Thumbnail($pathToImages);
if( $thumb )
{
list($width, $height) = getimagesize($pathToImages); //mendapatkan ukuran image, disimpan di list
$min = min($width, $height); //mendapatkan nilai terkecil dari height/widthnya
//$thumb->cropFromCenter($min); //memotong gambar dari tengah, sesuai ukuran min
$thumb->resize($min,$min); ///resize gambar
$thumb->cropFromCenter($min); 
//$thumb->resize($maxWidth,$maxHeight);
$thumb->save($pathToThumbs,$quality); //menyimpan gambar
}
else 
return false;
}
else
{
mail("feni@gmail.com","File Not Found $pathToImages", $pathToImages); 
return false;
}
return true;
}


$pathToImages = "img/ciuman.jpg";
$pathToThumbs="thumb/ciuman.jpg";
list($width, $height) = getimagesize($pathToImages);
$min = min($width, $height);
echo $min;
echo "<br>";
echo $width;
echo "<br>";
echo $height;


createThumbs( $pathToImages, $pathToThumbs, $maxWidth = 120, $maxHeight = 120, $quality=100 );

echo "ini image thumbnailnya  <br><br> ";
echo "<img src=".$pathToThumbs." >";
?>

