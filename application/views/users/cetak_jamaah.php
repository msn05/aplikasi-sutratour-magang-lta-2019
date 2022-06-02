<?php $this->load->view('cetak/header');?> <!--Include menu-->
<h1 style="font-family:courier;" align="center">Laporan Jamaah Daftar</h1>
<table style="font-family:courier;" border="1" width="100%"  cellspacing="0" cellpadding="4">
	<thead>
		<tr>
			<th>#</th>
			<th>Tanggal Daftar</th>
			<th>Kode Pendaftaran</th>
			<th>Nama</th>
			<th>Nomor Telephone</th>
			<th>Nama Layanan</th>
		</tr>
		<?php 
		$no =1 ; 
		foreach($mk as $row) : ?>
			<tr>
				<td><?php echo $no++?></td>
				<td><?=$row->id_daftar;?></td>
				<td><?php echo format_indo($row->tgl_daftar)?></td>
				<td><?=$row->nama_jamaah?></td>
				<td><?php echo $row->no_telephone?></td>
				<td><?php echo $row->nama_layanan?></td>
			</tr>
		<?php endforeach ; ?>
	</thead>

</table>

</body>
</html>                            