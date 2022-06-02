<?php $this->load->view('cetak/header');?> <!--Include menu-->
<style type="text/css">
	* {
		font-family: Verdana, Arial, sans-serif;
	}
	table{
		font-size: x-small;
	}
	tfoot tr td{
		font-weight: bold;
		font-size: x-small;
	}
	.gray {
		background-color: lightgray
	}
</style>

</head>
<body>

	<h4 style="background-color: blue;" align="center"> PEMBAYARAN ANDA </h4>

	<table width="100%">
		<tr>
			<td align="right"><strong>Palembang, </strong><?=format_indo(date('Y-m-d'));?></td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<?php foreach ($web as $x) ;?>
			<td><strong>From : </strong><?=$x->nama_perusahaan;?></td>
			<td align="right"><strong>To : </strong><?=$nama_jamaah;?></td>
		</tr>
	</table>
	<br/>
	<table width="100%">
		<thead style="background-color: lightgray;">
			<tr>
				<th>Nomor KTP</th>
				<th>Nomor Telephone</th>
				<th>Alamat</th>
				<th>Kode Pembayaran</th>
				<th>Tanggal Pembayaran</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td><?=$no_ktp;?></td>
				<td><?=$no_telephone;?></td>
				<td><?=$alamat;?></td>
				<td><?=$kode_pembayarannya;?></td>
				<td><?=$tgl_pembayaran;?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<table width="100%">
		<tr>
			<td>Keterangan</td>
			<td colspan="5"><?=strtoupper($keterangan);?></td>
		</tr>
		<tr>
			<td>Sudah Diterima </td>
			<td><?=rupiah($jumlah_uangnya);?></td>
			<td  colspan="5"><?=strtoupper(terbilang($jumlah_uangnya));?></td>
		</tr>
		<hr>
		<tr>
			<td>Sisa Pembayaran</td>
			<td><?=rupiah($sisa);?></td>
			<td colspan="5"><?=strtoupper(terbilang($sisa));?></td>
		</tr>
		<hr>
	</table>
</body>
</html>