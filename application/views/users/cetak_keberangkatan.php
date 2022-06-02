<?php $this->load->view('cetak/header');?> <!--Include menu-->
<h1 style="font-family:courier;" align="center">Laporan Keberangkatan Jamaah</h1>
<table style="font-family:courier;" border="1" width="100%"  cellspacing="0" cellpadding="4">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama</th>
			<th>Nomor KTP</th>
			<th>Nomor Telephone</th>
		</tr>
		<?php 
		$no =1 ; 
		foreach($mk as $row) : ?>
			<tr>
				<td><?php echo $no++?></td>
				<td><?php echo $row->nama_jamaah?></td>
				<td><?=$row->no_ktp?></td>
				<td><?=$row->no_telephone?></td>
			</tr>
		<?php endforeach ; ?>
	</thead>
</table>

<table style="font-family:courier;" border="3" width="100%"  cellspacing="0" cellpadding="4">
	<tr><p>Jamaah Diatas Berangkat pada Tanggal : <?=format_indo($row->tgl_keberangkatan);?> dan Jamaah yang berangkat sebanyak  <?php foreach ($total as $x );?><?=$x;?> orang</p></tr>
</table>

</body>
</html>                            