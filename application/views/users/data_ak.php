<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
	<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
		<h5 class="txt-dark">Data Artikel Perusahaan</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Page</a></li>
			<li><a href="index.html">Data Artikel </a></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<?= $this->session->flashdata('message');?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Data Artikel Saat Ini</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="button-list mt-25">
				<?php if($this->session->userdata('akses')==='1' || $this->session->userdata('akses')==='2'  ) { ?>

					<a href="<?=base_url().'data_atk/tambahArtikelnya';?>"><button class="icon-plus btn btn-success"> Tambah Artikel Baru</button></a>
				<?php } ?>
			</div>
			<hr>
			<div class="clearfix"></div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="data_artikel" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>ID</th>
										<th>Judul</th>
										<th>Tanggal Posting</th>
										<th>Nama Users</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>


<form id="add-row-form" action="<?=base_url().'data_atk/hapusart'?>" method="post">
	<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Hapus Artikel Ini</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_artikel" id="id_artikel" class="form-control" placeholder="" required>
					<strong>Anda yakin mau menghapus artikel ini ?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" id="add-row" class="btn btn-success">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</form>

<form id="add-row-form" action="<?=base_url().'data_atk/post'?>" method="post">
	<div class="modal fade" id="ModalPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Post Artikel Ini</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_artikel" id="id_artikel" class="form-control" placeholder="" required>
					<strong>Anda yakin mau memposting artikel ini ini ?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" id="add-row" class="btn btn-success">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php $this->load->view('users/footer');?> <!--Include menu-->

<script>

	$(document).ready(function(){
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
		{
			return {
				"iStart": oSettings._iDisplayStart,
				"iEnd": oSettings.fnDisplayEnd(),
				"iLength": oSettings._iDisplayLength,
				"iTotal": oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
				"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
			};
		};

		var table = $("#data_artikel").dataTable({
			initComplete: function() {
				var api = this.api();
				$('#data_artikel_filter input')
				.off('.DT')
				.on('input.DT', function() {
					api.search(this.value).draw();
				});
			},
			oLanguage: {
				sProcessing: "loading..."
			},
			processing: true,
			serverSide: true,
			ajax: {"url": "<?php echo base_url().'index.php/data_atk/data_artik'?>", "type": "POST"},
			columns: [

			{"data": "id_artikel"},
			{"data": "judul"},
			
			{"data": "tgl_postnya"},
			{"data": "nama"},
			{"data": "status","render": function (data, type, row )
			{ 
				return row.status == 1 ? 'Belum Di Posting' : 'Posting';
			}},
			{"data": "id_artikel","render":function(data,type,row)
			{
				return '<div class="btn btn-xs "> <a class="fa fa-info btn btn-info" href="data_atk/detail/'+data+'"></a><a class="fa fa-trash-o btn btn-danger  hapus_art" href="javascript:void(0);" data-id_artikel='+data+'> <a class="fa fa-edit btn btn-warning" href="data_atk/edit/'+data+'"></a><a class="fa fa-upload btn btn-success post" href="javascript:void(0);" data-id_artikel='+data+'></a> </div>';
			}}
			],
			order: [[1, 'asc']],
			rowCallback: function(row, data, iDisplayIndex) {
				var info = this.fnPagingInfo();
				var page = info.iPage;
				var length = info.iLength;
				$('td:eq(0)', row).html();      }

			});

		$('#data_artikel').on('click','.hapus_art',function(){
			var id_artikel=$(this).data('id_artikel');
			$('#ModalHapus').modal('show');
			$('[name="id_artikel"]').val(id_artikel);
		});

		$('#data_artikel').on('click','.post',function(){
			var id_artikel=$(this).data('id_artikel');
			$('#ModalPost').modal('show');
			$('[name="id_artikel"]').val(id_artikel);
		});


	});
</script>
