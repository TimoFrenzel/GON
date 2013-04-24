<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Galerie</title>
<style type="text/css">
	body{
		background-color:#350000;
	}
	#galerie {
		background-color:#350000;
		color:#fff;
	}
	a{
		color:#fff;
	}
</style>

</head>
<body>
<div id='galerie'>
<div align='center'>
	<FIELDSET style='width: 450px'>
		<LEGEND>
			<STRONG>Galerie</STRONG>
		</LEGEND>
<?php
require_once 'OsDownloader.php';
require_once 'OsGalerie.php';

$oGalerie = new OsGalerie();

if(!$_GET['show']){
	$oGalerie->setMShowDebug(1);
	$oGalerie->readOrder("./");
	$oGalerie->setMImagePerSite(25);
	echo $oGalerie->create();
}else{
	$oGalerie->setMShowDebug(1);
	echo $oGalerie->createOne();
}
?>

</fieldset>
</div>
</div>
</body>
</html>