         <!-- Footer -->
         <footer class="footer container-fluid pl-30 pr-30">
          <div class="row">
            <div class="col-sm-12">
              <?php foreach ($web as $row);?>
              <p><?=$row->footer;?></p>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <script src="<?=base_url().'assets/html/vendors/bower_components/jquery/dist/jquery.min.js';?>"></script>
  <script src="<?=base_url().'assets/html/vendors/bower_components/summernote/dist/summernote.min.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/summernote-data.js';?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?=base_url().'assets/html/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/jquery.slimscroll.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/dropdown-bootstrap-extended.js';?>"></script>
  <script src="<?=base_url().'assets/html/vendors/jquery.sparkline/dist/jquery.sparkline.min.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/skills-counter-data.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/morris-data.js';?>"></script>
  <script src="<?=base_url().'assets/html/vendors/bower_components/switchery/dist/switchery.min.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/lightgallery-all.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/gallery-data.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/widgets-data.js';?>"></script>
  <script src="<?=base_url().'assets/html/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js';?>"></script>

  <script src="<?=base_url().'assets/html/vendors/bower_components/datepicker/bootstrap-datepicker.js';?>"></script>
  <script src="<?=base_url().'assets/html/full-width-light/dist/js/dataTables-data.js';?>"></script>
  <script src="<?=base_url().'assets/html/vendors/bower_components/sweetalert/dist/sweetalert.min.js';?>"></script>
  <script src="<?=base_url().'assets/html/vendors/bower_components/select2/dist/js/select2.min.js';?>"></script>
  <!-- Moment JavaScript -->
  <script type="text/javascript" src="<?=base_url().'assets/html/vendors/bower_components/moment/min/moment-with-locales.min.js';?>"></script>

  <script src="<?=base_url().'assets/html/full-width-light/dist/js/init.js';?>"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script>

    $(document).ready(function() {

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

      var table = $("#dt_1").dataTable({
        initComplete: function() {
          var api = this.api();
          $('#dt_1_filter input')
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
        ajax: {"url": "<?php echo base_url().'index.php/page/get_guest_json'?>", "type": "POST"},
        columns: [

        {"data": "id_pegawai"},
        {"data":"foto",
        "render": function (data)
        {
          return '<img height="80px" width="80px" src="../uploads/foto/' + data + '" />';

        }},
        {"data": "nama"},
        {"data": "email"},
        {"data": "nama_jabatan"},
        {"data": "no_telp"},
        {"data": "login_akun"},
        {"data": "nama_akses"},
        {"data": "view","render":function(data,type,row){
          return row.id_akses == 1 || row.id_akses == 3 ? "" : row.view;
        }},
        {"data": "reset"}
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          $('td:eq(0)', row).html();  }

        });

      var table = $("#transD").dataTable({
        initComplete: function() {
          var api = this.api();
          $('#transD_filter input')
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
        ajax: {"url": "<?php echo base_url().'index.php/page/get_transd_json'?>", "type": "POST"},
        columns: [

        {"data": "id_td"},
        {"data": "nama_tdnya"},
        {"data": "view"} 
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          $('td:eq(0)', row).html();      }

        });

      var table = $("#TM").dataTable({
        initComplete: function() {
          var api = this.api();
          $('#TM_filter input')
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
        ajax: {"url": "<?php echo base_url().'index.php/page/get_TM'?>", "type": "POST"},
        columns: [

        {"data": "id_tm"},
        {"data": "nama_tmnya"},
        {"data": "view"} 
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          $('td:eq(0)', row).html();      }

        });

      var table = $("#transU").dataTable({
        initComplete: function() {
          var api = this.api();
          $('#transU_filter input')
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
        ajax: {"url": "<?php echo base_url().'index.php/page/get_transu_json'?>", "type": "POST"},
        columns: [

        {"data": "id_tu"},
        {"data": "nama_tunya"},
        {"data": "view"} 
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          $('td:eq(0)', row).html();      }

        });

      $('#dt_1').on('click','.hapus',function(){
        var kode=$(this).data('kode');
        $('#ModalHapus').modal('show');
        $('[name="id_pegawai"]').val(kode);
      });


      $("#btn-tambah").click(function(){ 
        var jumlah = parseInt($("#jumlah-form").val()); 
        var nextform = jumlah + 1;

        $("#tambah-form-transd").append(
          "<div class='form-group'>" +
          "<label class='col-sm-3 control-label'>Nama Transportasi Nya</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<input type='hidden' class='' name='id_td[]'>"+
          "<input type='text' class='form-control' name='nama_tdnya[]' placeholder='Nama TransportasiNya'>"+
          "  <?=form_error('nama_tdnya[]','<small  class="text-danger pl-2">','</small>')?>"+
          "<div class='input-group-addon'><i class='icon-bus'></i></div>"+
          "</div>" +
          "</div>" +
          "</div>"
          );

        $("#tambah-form-transu").append(
          "<div class='form-group'>" +
          "<label class='col-sm-3 control-label'>Nama Transportasi Nya</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<input type='hidden' class='' name='id_tu[]'>"+
          "<input type='text' class='form-control' name='nama_tunya[]' placeholder='Nama TransportasiNya'>"+
          "  <?=form_error('nama_tunya[]','<small  class="text-danger pl-2">','</small>')?>"+
          "<div class='input-group-addon'><i class='icon-bus'></i></div>"+
          "</div>" +
          "</div>" +
          "</div>"
          );  

        $("#tambah-form-TM").append(
          "<div class='form-group'>" +
          "<label class='col-sm-3 control-label'>Nama Tempat Nya</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<input type='hidden' class='' name='id_tm[]'>"+
          "<input type='text' class='form-control' name='nama_tmnya[]' placeholder='Nama Tempatnya'>"+
          "  <?=form_error('nama_tmnya[]','<small  class="text-danger pl-2">','</small>')?>"+
          "<div class='input-group-addon'><i class='icon-home'></i></div>"+
          "</div>" +
          "</div>" +
          "</div>"
          );

        $("#jumlah-form").val(nextform); 
      });

      $("#btn-reset").click(function(){
        $("#tambah-form-transd").html(""); 
        $("#tambah-form-transu").html(""); 
        $("#tambah-form-TM").html(""); 
        $("#jumlah-form").val("1");
      });

      $("#btn-tambah").click(function(){ 
        var jumlah = parseInt($("#jumlah-form").val()); 
        var nextform = jumlah + 1;

        $("#tambah-form-promo").append(
          "<div class='col-sm-6'>"+
          "<div class='form-group'>"+
          "<label for='exampleInputuname_5' class='col-sm-3 control-label'>Kode Promo</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<input type='hidden' name='id_promo[]'' id='id_promo' placeholder='Nama Jabatannya'>"+
          "<input type='text' class='form-control' name='kode_promo[]' id='kode_promo[]' placeholder='Masukkan Kode Promonya'>"+
          "<div class='input-group-addon'><i class='fa fa-code'></i>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "<div class='col-sm-6'>"+
          "<div class='form-group'>"+
          "<label for='exampleInputuname_4' class='col-sm-3 control-label'>Nama Promo</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<input type='text' class='form-control' name='nama_promo[]' id='nama_promo[]' placeholder='Masukkan Nama Promonya'>"+
          "<div class='input-group-addon'><i class='icon-name'></i>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+  
          "</div>"+
          "<div class='col-sm-6'>"+
          "<div class='form-group'>"+
          "<label for='exampleInputuname_4' class='col-sm-3 control-label'>Batas Promo</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<input type='text' class='tanggal form-control' name='batas_promo[]' id='batas_promo[]' placeholder='Format Tahun-bulan-hari' autocomplate='off'>"+
          "<div class='input-group-addon'><i class='icon-calender'></i>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+  
          "</div>"+
          "<div class='col-sm-6'>"+
          "<div class='form-group'>"+
          "<label class='col-sm-3 control-label'>Transportasi Daratnya</label>"+
          "<div class='col-sm-9'>"+
          "<div class='input-group'>"+
          "<select class='form-control' id='nama_layanan[]' name='nama_layanan[[]'>"+
          "<option class='form-control' value='0' selected disabled>Pilih Layanan</option>"+
          "<option class='form-control' value='1'>UMROH PLUS</option>"+
          "<option class='form-control' value='2'>UMROH REGULER</option>"+
          "<option class='form-control' value='3'>HAJI PLUS</option>"+
          "<option class='form-control' value='4'>HAJI REGULER</option>"+
          "</select>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>"
          );

        $("#jumlah-form").val(nextform); 
      });


      $('#editordata').summernote({
        toolbar: [    
        ],
        
      });

      $('.editordata').summernote({
        toolbar: [    
        ],
        
      });

      $('#transD').on('click','.editTransD',function(){
        var id_td=$(this).data('id_td');
        var nama_tdnya=$(this).data('nama_tdnya');
        $('#ModalUpdate').modal('show');
        $('[name="id_td"]').val(id_td);
        $('[name="nama_tdnya"]').val(nama_tdnya);
      });     

      $('#TM').on('click','.editTM',function(){
        var id_tm=$(this).data('id_tm');
        var nama_tmnya=$(this).data('nama_tmnya');
        $('#ModalUpdate').modal('show');
        $('[name="id_tm"]').val(id_tm);
        $('[name="nama_tmnya"]').val(nama_tmnya);
      });

      $('#transU').on('click','.editTransU',function(){
        var id_tu=$(this).data('id_tu');
        var nama_tunya=$(this).data('nama_tunya');
        $('#ModalUpdate').modal('show');
        $('[name="id_tu"]').val(id_tu);
        $('[name="nama_tunya"]').val(nama_tunya);
      });

      $('#dt_1').on('click','.reset',function(){
        var id_pegawai=$(this).data('id_pegawai');
        $('#ModalUpdate').modal('show');
        $('[name="id_pegawai"]').val(id_pegawai);
      });     

      var table = $("#hdp").dataTable({
        initComplete: function() {
          var api = this.api();
          $('#hdp_filter input')
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
        ajax: {"url": "<?php echo base_url().'index.php/page/get_hdp_json'?>", "type": "POST"},
        columns: [
        {"data": "kode_promo"},
        {"data": "nama"},
        {"data": "tgl_update"},
        {"data": "keterangan"}
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          $('td:eq(0)', row).html();      
        }
      });

      $('.tanggal').datepicker({
        format: "yyyy-mm-dd",
        autoclose:true
      });

    });

  </script>

</body>
</html>


