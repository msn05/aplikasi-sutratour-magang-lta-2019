<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Data Jadwal Keberangkatan</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><sa href="index.html">Jamaah yang Berangkat</a></li>
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
      <h6 class="panel-title txt-dark">Data Jadwal Keberangkan Dengan Kode <code><?=$id_keberangkatan;?></code></h6>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="button-list mt-25">
    <button type="button" class="tambah icon-plus btn btn-success" > Tambah Jamaah Baru</button>

  </div>
  <hr>
  <div class="clearfix"></div>
  <div class="panel-wrapper collapse in">
    <div class="panel-body">
     <div class="table-wrap">
      <div class="table-responsive">
        <table id="datable_1" class="table table-hover display  pb-30" >
          <thead>
           <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Nomor KTP</th>
            <th>Email</th>
            <th>Nomor Telephone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
         <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Nomor KTP</th>
          <th>Email</th>
          <th>Nomor Telephone</th>
          <th>Action</th>
        </tr>
      </tfoot>

      <tbody>
        <?php 
        $no =1;
        foreach ($k->result() as $key ) {

         ?>
         <tr>
          <td><?=$no++;?></td>
          <td><?=$key->nama_jamaah;?></td>
          <td><?=$key->no_ktp;?></td>
          <td><?=$key->email;?></td>
          <td><?=$key->no_telephone;?></td>
          <td class="text-center align-middle">
            <button type="submit" class="btn btn-danger fa fa-trash-o" onclick="hapuslah(<?=$id;?>)"></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>  
</div>

<form id="baru" class="form-horizontal" action="<?php echo base_url().'jadwal/TambahBaru'?>" method="post">
  <div class="col-sm-8">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
       <div class="pull-left">
        <h6 class="panel-title txt-dark">Tambah Jamaah</h6>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="form-wrap">
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-md-4 control-label">Kode Keberangkatannya</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" class="form-control" value="<?=$id_keberangkatan;?>" name="id_keberangkatan" id="id_keberangkatan">
                    <input type="text" class="form-control" value="<?=$tgl_keberangkatan;?>" name="tgl_keberangkatan" id="tgl_keberangkatan">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputuname_4" class="col-sm-4 control-label">Cari Bulannya</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <select class=" form-control" id="bulan_keberangkatan" name="bulan_keberangkatan" autocomplate="off">
                    <option value="0">Pilih Bulannya</option>
                    <?php foreach ($bulan->result() as $row) :?>
                     <option value="<?=$row->kode_jadwal_keberangkatan;?>"><?php echo format_indo($row->bulan_keberangkatan);?></option>
                   <?php endforeach;?>
                 </select>
               </div>
             </div>
           </div>
           <div class="form-group">
            <label for="exampleInputuname_4" class="col-sm-4 control-label">Nama Jamaah</label>
            <div class="col-sm-6">
              <div class="input-group col-sm-12">
                <select  class="namanya form-control" id="nama_jamaah" name="nama_jamaah[]" multiple/>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group mb-0">
          <div class="col-sm-offset-3 col-sm-12">
            <button type="submit"  class="btn btn-primary ">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</form>

<?php $this->load->view('users/footer');?> <!--Include menu-->

<script type="text/javascript">
 $(document).ready(function(){
  $('#bulan_keberangkatan').change(function(){
    var kode_jadwal_keberangkatan=$(this).val();
    $.ajax({
      url : "<?php echo base_url();?>jadwal/cari_jamaahnya",
      method : "POST",
      data : {kode_jadwal_keberangkatan: kode_jadwal_keberangkatan},
      async : false,
      dataType : 'json',
      success: function(data){
        var html = '';
        for(i=0; i<data.length; i++){
          html += '<option  value='+data[i].id_daftar+' class=>'+data[i].nama_jamaah+'</option>';
        }

        $(".namanya").select2({
        });
        $('.namanya').html(html);
      }
    });
  });



  $('#baru').hide();        


  $('.tambah').click(function(){
    $("#baru").toggle();
  });




});

 function hapuslah(id)

 {

  swal({
    title: 'Apakah Jamaah Ingin Dihapus?',
    type: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya',
    closeOnConfirm : false
  },
  function(){

    $.ajax({
      url : "<?php echo base_url().'jadwal/hapuslah'?>",
      type : "post",
      data : {
        id:id},
        success : function(){
          swal('Data Berhasil Disimpan','success');
          $("#baru").fadeTo("slow",0.9,function(){
            window.location.assign("<?=base_url().'jadwal';?>");
            // location.reload;
          });
        },
        error:function(){
          swal('Gagal Melakukan Pembayaran','error');
        }

      });
  });
}




</script>