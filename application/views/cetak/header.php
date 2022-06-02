<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cetak</title>
</head>

<body>
	<table style="font-family:courier;"  width="100%"  cellspacing="0" cellpadding="4">
		<tr>
			<td width="70" align="center"><img src="./uploads/files/foto_default.PNG" width="100%"></td>
			<?php foreach ($web as $row ) ;?>
			<td  align="center"><h3><?=$row->nama_perusahaan;?></h3>
				<h5><?=$row->alamat;?></h5><p><h5><?=$row->kontak;?></h5></p>
				</td>
				<td width="40" align="center"><img src="./uploads/files/sumsel.PNG" width="100%"></td>
			</tr>
		</table>
		<hr>
