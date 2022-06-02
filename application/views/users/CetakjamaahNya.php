<?php $this->load->view('cetak/header');?> <!--Include menu-->
<h1 style="font-family:courier;" align="center">Data Diri Jamaah</h1>
<table style="font-family:courier;"  width="100%"  cellspacing="0" cellpadding="4">
	<tr>
		<td>Nama</td>
		<td> : </td>
		<td><?=$nama_jamaah;?></td>
		<td rowspan="3" align="center" >
			<img  style="float:left;" width="100" height="150" src="./uploads/jamaah/<?=$fotonya;?>" width="100%">
		</td>
	</tr>
	<tr>
		<td>Nomor Passport</td>
		<td> : </td>
		<td> <?=$no_passport;?> 
	</td>
</tr>
<tr>
	<td>Email</td>
	<td> : </td>
	<td><?=$email;?></td>
</tr>
<tr>
	<td>Nomor Kartu Tanda Penduduk</td>
	<td> : </td>
	<td> <?=$no_ktp;?> 
</td>
</tr>
<tr>
	<td>Nomor Kartu Keluarga</td>
	<td> : </td>
	<td><?=$no_kk;?></td>
</tr>
<tr>
	<td>Alamat</td>
	<td> : </td>
	<td style = "word-wrap: break-word"><?=$alamat;?></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td> : </td>
	<td><?=format_indo($tgl_lahir);?></td>
</tr>
<tr>
	<td>Nomor Telephone</td>
	<td> : </td>
	<td><?=$no_telephone;?></td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td> : </td>
	<td><?=$jk[$jenis_kelamin];?></td>
</tr>
<tr>
	<td>Pekerjaan</td>
	<td> : </td>
	<td><?=$pk[$pekerjaan];?></td>
</tr>
<tr>
	<td>Layanan Yang Dipilih</td>
	<td> : </td>
	<?php foreach ($jadwal as $row) ;?>
	<td><?php echo $row->nama_layanan;?></td>
</tr>
<tr>
	<td>Bulan Keberangkatan</td>
	<td> : </td>
	<td><?=format_indo($row->bulan_keberangkatan);?></td>
</tr>
<tr>
	<td>Harga</td>
	<td> : </td>
	<td><?= rupiah($jumlah_yang_dibayarkan);?></td>
</tr>
<tr>
	<td>Status Dokumen</td>
	<td> : </td>
	<td><?= $s[$status_dokumen];?></td>
</tr>
<tr>
	<td>Status Pembayaran</td>
	<td> : </td>
	<td><?= $pdj[$status_pembayaran];?></td>
</tr>
<tr>
	<td>Status</td>
	<td> : </td>
	<td><?= $p[$statusnya];?></td>
</tr>
<tr>
	<td>Tanggal Berangkat</td>
	<td> : </td>

	<td><?= $b;?></td>
</tr>
<p>Terima kasih anda telah terdaftar sebagai jamaah Sutra Tour Hidayah Palembang. Kami akan berusaha memaksimalkan fasilitas yang untuk menunjang anda dalam beribah.</p>


</table>

</body>
</html>                            