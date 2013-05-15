<?php
include "thumbnail.inc.php";
function createThumbs( $pathToImages, $pathToThumbs, $maxWidth = 120, $maxHeight = 120, $quality=100 )
{

	if( is_file($pathToImages) )
	{
		$thumb = new Thumbnail($pathToImages);
		if( $thumb )
			{
			list($width, $height) = getimagesize($pathToImages); //mendapatkan ukuran image, disimpan di list
			$min = min($width, $height); //mendapatkan nilai terkecil dari height/widthnya
			$thumb->cropFromCenter($min); //memotong gambar dari tengah, sesuai ukuran min 
			$thumb->resize($maxWidth,$maxHeight); //resize gambar berdasarkan maxWidth dan maxHeight
			$thumb->save($pathToThumbs,$quality); //menyimpan gambar
			}
		else 
			return false;
			}
	else
	{
	mail("fenifah@gmail.com","File Not Found $pathToImages", $pathToImages); 
	return false;
	}
	return true;
	}


	$pathToImages = "img/ciuman.jpg"; //path img yg mau d buat thumbnail
	$pathToThumbs= "thumb/ciuman.jpg"; //path buat thumbnail ntar

	//masuk function
	createThumbs( $pathToImages, $pathToThumbs, $maxWidth = 120, $maxHeight = 120, $quality=100 );

	//liat hasilnya aja
	echo "ini image thumbnailnya  <br><br> ";
	echo "<img src=".$pathToThumbs." >";
?>

