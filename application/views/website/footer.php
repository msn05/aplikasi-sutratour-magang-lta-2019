<footer id="footer" style="width: 100%;position: relative; bottom: 0px;" >
  <div class="container" >
    <div class="footer-copyright"  >
      <p class="copyright-text">Copyright © 2018 <?php foreach ($web as $key);?><?=$key->footer;?> <a href="#">Quickai</a>. All Rights Reserved.</p>
    </div>
  </div>
</footer><!-- Footer end -->

</div><!-- Document Wrapper end -->


<!-- Script -->
<script src="<?=base_url().'assets/depan/html/vendor/jquery/jquery.min.js';?>"></script>
<script src="<?=base_url().'assets/html/vendors/bower_components/summernote/dist/summernote.min.js';?>"></script>
<script src="<?=base_url().'assets/html/vendors/bower_components/sweetalert/dist/sweetalert.min.js';?>"></script>
<script src="<?=base_url().'assets/depan/html/vendor/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<script src="<?=base_url().'assets/depan/html/vendor/owl.carousel/owl.carousel.min.js';?>"></script> 
<script src="<?=base_url().'assets/depan/html/vendor/bootstrap-spinner/bootstrap-spinner.js';?>"></script> 
<script src="<?=base_url().'assets/html/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js';?>"></script>
<script src="<?=base_url().'assets/depan/html/js/theme.js';?>"></script> 
<script src="<?=base_url().'assets/html/vendors/bower_components/datepicker/bootstrap-datepicker.js';?>"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<!-- Moment JavaScript -->
<script type="text/javascript" src="<?=base_url().'assets/html/vendors/bower_components/moment/min/moment-with-locales.min.js';?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
  $(document).ready(function(){
    $("[data-fancybox]").fancybox();

    $('.tanggal').datepicker({
      format: "yyyy-mm-dd",
      autoclose:true
    });

    function hitung() {
      var sisa_pembayaran = $(".sisa_pembayaran").val();
      var jumlah_uangnya = $(".jumlah_uangnya").val();
    total = sisa_pembayaran - jumlah_uangnya; //a kali b
    $(".total").val(total);
  }

  function edit(id_daftar)
  {
    swal({
      title: 'Apakah Yakin Ingin Merubah Datanya?',
      type: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      closeOnConfirm : false
    },
    function(){
      var no_passport   = $('#no_passport').val();
      var nama_jamaah   = $('#nama_jamaah').val();
      var email   = $('#email').val();
      var no_ktp   = $('#no_ktp').val();
      var no_kk   = $('#no_kk').val();
      var alamat   = $('#alamat').val();
      var tgl_lahir   = $('#tgl_lahir').val();
      var no_telephone   = $('#no_telephone').val();
      var jenis_kelamin   = $('#jenis_kelamin').val();
      var pekerjaan   = $('#pekerjaan').val();
      var pemilihan_bulan_kbr   = $('#pemilihan_bulan_kbr').val();
      var paket_yang_dipilih   = $('#paket_yang_dipilih').val();
      var total   = $('#total').val();
      $.ajax({
        url : "<?php echo base_url().'jamaah/ubahdata';?>",
        type : "post",
        data : {
          id_daftar:id_daftar,nama_jamaah:nama_jamaah,email:email,no_ktp:no_ktp,no_kk:no_kk,no_passport:no_passport,alamat:alamat,tgl_lahir:tgl_lahir,no_telephone:no_telephone,jenis_kelamin:jenis_kelamin,pekerjaan:pekerjaan,pemilihan_bulan_kbr:pemilihan_bulan_kbr,paket_yang_dipilih:paket_yang_dipilih,total:total
        },
        success : function(){
          swal('Data Berhasil Diubah','success');
          $("#secondTab").fadeTo("slow",0.5,function(){
            location.reload();
          });
        },
        error:function(){
          swal('Data gagal diubah','error');
        }

      });
    });
  }

  $('#editordata').summernote({
    toolbar: [    
    ],
    
  });

  $('.editordata').summernote({
    toolbar: [    
    ],
    
  });




  function bayarkah(id_daftar)
  {
    swal({
      title: 'Apakah Sudah Di Cek Uangnya?',
      type: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      closeOnConfirm : false
    },
    function(){
      var kode_pembayaran   = $('#kode_pembayaran').val();
      var status_pembayaran   = $('#status_pembayaran').val();
      var jumlah_uangnya   = $('#jumlah_uangnya').val();
      var total   = $('#total').val();
      var keterangan   = $('#keterangan').val();
      var statusnya   = $('#statusnya').val();
      $.ajax({
        url : "<?php echo base_url().'jamaah/bayarnah';?>",
        type : "post",
        data : {
          id_daftar:id_daftar,kode_pembayaran:kode_pembayaran,jumlah_uangnya:jumlah_uangnya,total:total,keterangan:keterangan,status_pembayaran:status_pembayaran,statusnya:statusnya},
          success : function(){
            swal('Data Berhasil Disimpan','success');
            $("#oke").fadeTo("slow",0.5,function(){
              location.reload();
            });
          },
          error:function(){
            swal('Gagal Melakukan Pembayaran','error');
          }

        });
    });
  }
});

</script>

</body>
</html>