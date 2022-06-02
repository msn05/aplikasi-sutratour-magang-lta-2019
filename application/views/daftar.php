
<div id="content">
  <div class="container">
    <div class="bg-light shadow-md rounded p-4">
      <div class="row">

        <div class="col-md-12">
          <div class="tab-content my-3" id="myTabContentVertical">
            <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
              <div class="row">
                <?= $this->session->flashdata('message');?>
                <div class="col-lg-12">
                  <h4 class="mb-4">Informasi Data Pribadi</h4>
                  <?=form_open_multipart('daftar/insert');?>
                  <div class="form-wrap mt-40">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputuname_4" class="col-sm-4 control-label">Kode Pendaftaran</label>
                          <div class="col-lg-3">
                            <div class="input-group">
                              <input type="hidden" class="form-control" name="kode_pembayaran" id="kode_pembayaran" value="<?=$kode_pembayaran;?>">
                              <input type="text" class="form-control" name="id_daftar[]" id="id_daftar[]" value="<?=$kode_pendaftaran;?>" readonly="">
                              <div class="input-group-addon"><i class="icon-code"></i></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-wrap mt-40">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputuname_4" class="col-sm-4 control-label">Nomor Passport*</label>
                          <div class="col-sm-9">
                            <div class="input-group">
                              <input type="text" class="form-control" name="no_passport[]" id="no_passport[]" placeholder="Nomor Passportnya">
                              <div class="input-group-addon"><i class="icon-promo"></i></div>
                            </div>
                            <?=form_error('no_passport[]','<small  class="text-danger pl-2">','</small>')?>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputuname_4" class="col-sm-4 control-label">Tempat Pembuatan </label>
                          <div class="col-sm-9">
                            <div class="input-group">
                              <input type="text" class="form-control" name="tkp" id="tkp" placeholder="Tempat Pembuat Passport">
                              <div class="input-group-addon"><i class="icon-book"></i></div>
                            </div>
                            <?=form_error('no_passport[]','<small  class="text-danger pl-2">','</small>')?>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-wrap mt-40">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputuname_4" class="col-sm-6 control-label">Tanggal Dikeluarkan Passport</label>
                          <div class="col-sm-9">
                            <div class="input-group">
                              <input type="text" class="form-control tanggal" autocomplete="off" name="tgl_dikeluarkanP" id="tgl_dikeluarkanP" value="">
                            </div>
                            <?=form_error('tgl_dikeluarkanP','<small  class="text-danger pl-2">','</small>')?>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputuname_4" class="col-sm-6 control-label">Masa Berlaku*</label>
                          <div class="col-sm-9">
                            <div class="input-group">
                              <input type="text" class="form-control date" name="masa_berlakuP" id="masa_berlakuP" autocomplete="off" placeholder="Tahun Bulan">
                              <div class="input-group-addon"><i class="icon-promo"></i></div>
                            </div>
                            <?=form_error('masa_berlakuP','<small  class="text-danger pl-2">','</small>')?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-6 control-label">Nama Jamaah</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="form-control" name="nama_jamaah[]" id="nama_jamaah[]" value="<?=set_value('nama_jamaah[]')?>">
                                <div class="input-group-addon"><i class="fa fa-name"></i>
                                </div>
                              </div>
                              <?=form_error('nama_jamaah[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Nomor KTP*</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="form-control" name="no_ktp[]" id="no_ktp[]" value="<?=set_value('no_ktp[]')?>">
                                <div class="input-group-addon"><i class="icon-promo"></i></div>
                              </div>
                              <?=form_error('no_ktp[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Nomor KK*</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="form-control" name="no_kk[]" id="no_kk[]" value="<?=set_value('no_kk[]')?>">
                                <div class="input-group-addon"><i class="icon-promo"></i></div>
                              </div>
                              <?=form_error('no_kk[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Email*</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="form-control" name="email" id="email" value="">
                                <div class="input-group-addon"><i class="fa fa-mail"></i>
                                </div>
                              </div>
                              <?=form_error('email','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Tanggal Lahir*</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="tanggal form-control" name="tgl_lahir[]" id="tgl_lahir[]" placeholder="Nomor Passportnya" autocomplete="off">
                                <div class="input-group-addon"><i class="icon-calender"></i></div>
                              </div>
                              <?=form_error('tgl_lahir[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <select name="jenis_kelamin[]" id="jenis_kelamin" class="form-control">
                                  <option value="0" selected="" disabled="">Pilih Jenis Kelamin</option>
                                  <option value="1">Laki - laki</option>
                                  <option value="2">Perempuan</option>
                                </select>
                                <div class="input-group-addon"><i class="fa fa-gender"></i>
                                </div>
                              </div>
                              <?=form_error('jenis_kelamin[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Alamat*</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <textarea class="form-control" name="alamat[]" id="alamat[]" placeholder="Alamat Sesuai KTP"><?=set_value('alamat[]');?></textarea>
                                <div class="input-group-addon"><i class="fa fa-street"></i></div>
                              </div>
                              <?=form_error('alamat[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Pekerjaan</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <select name="pekerjaan[]" id="pekerjaan" class="form-control">
                                  <option value="0" selected="" disabled="">Pilih Jenis Pekerjaan</option>
                                  <option value="1">PNS</option>
                                  <option value="2">Swasta</option>
                                  <option value="3">Wiraswasta</option>
                                </select>
                                <div class="input-group-addon"><i class="fa fa-work"></i>
                                </div>
                              </div>
                              <?=form_error('pekerjaan[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-6 control-label">Nomor Telephone*</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="form-control" name="no_telephone[]" id="no_telephone[]" placeholder="Nomor Telephonenya" value="<?=set_value('no_telephone[]');?>">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                              </div>
                              <?=form_error('no_telephone[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-6 control-label">Nama Layanan</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <select class="form-control"  id="paket_yang_dipilih" name="paket_yang_dipilih">
                                  <option class="form-control" value="0" selected disabled>Pilih Layanan</option>
                                  <?php foreach ($dp->result() as $row) :?>
                                    <option class="form-control" value="<?php echo $row->id;?>"><?php echo $row->nama_layanan;?></option>
                                  <?php endforeach ;?>
                                </select>
                              </div>
                              <?=form_error('paket_yang_dipilih[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-6 control-label">Pemilihan jadwal</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <select class="pemilihan_bulan_kbr form-control"  name="pemilihan_bulan_kbr">
                                  <option value="0" disabled>Pilih Jadwal Keberangkatan</option>
                                </select>
                              </div>
                              <?=form_error('pemilihan_bulan_kbr[]','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="text" class="total form-control" name="total" id="total" readonly="">
                                <div class="input-group-addon"><i class="fa fa-price"></i>
                                </div>
                              </div>
                              <?=form_error('total','<small  class="text-danger pl-2">','</small>')?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Foto Diri</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="file" name="fotonya[]" id="fotonya[]" name="fotonya[]" class="form-control"> <div class="input-group-addon"><i class="fa fa-people"></i>
                                </div>
                                <?=form_error('fotonya[]','<small  class="text-danger pl-2">','</small>')?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputuname_4" class="col-sm-3 control-label">Foto KTP</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="file" class="form-control" name="foto_ktp[]" id="foto_ktp[]">
                                <div class="input-group-addon"><i class="fa fa-identity"></i>
                                </div>
                                <?=form_error('foto_ktp[]','<small  class="text-danger pl-2">','</small>')?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap mt-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Foto KK</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <input type="file" name="foto_kk[]" id="foto_kk[]" class="form-control">  <div class="input-group-addon"><i class="fa fa-identity"></i>
                                </div>
                                <?=form_error('foto_kk[]','<small  class="text-danger pl-2">','</small>')?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group mb-0">
                      <div class="form-group mb-0">
                        <div class="col-sm-offset-4 col-sm-9">
                          <button type="submit" class="btn btn-primary ">Simpan</button>
                          <!-- <input type="hidden" id="jumlah-form-jamaah" value="1"> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
  <?php $this->load->view('website/footer');?>

  <script>
    $(document).ready(function(){

      $('#paket_yang_dipilih').change(function(){
        var id=$(this).val();
        $.ajax({
          url : "<?php echo base_url();?>index.php/daftar/harga_layan",
          method : "POST",
          data : {id: id},
          async : false,
          dataType : 'json',
          success: function(data){
            var html = '';
            for(i=0; i<data.length; i++){
              html += data[i].biaya;
            }
            $('.total').val(html);

          }
        });
      });


      $('#paket_yang_dipilih').change(function(){
        var id=$(this).val();
        $.ajax({
          url : "<?php echo base_url();?>daftar/bulan",
          method : "POST",
          data : {id: id},
          async : false,
          dataType : 'json',
          success: function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
              html += '<option value='+data[i].kode_jadwal_keberangkatan+' class=>'+data[i].bulan_keberangkatan+'</option>';
            }
            $('.pemilihan_bulan_kbr').html(html);

          }
        });
      });
    });




  </script>