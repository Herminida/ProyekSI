      <div class="row" id="rowFrmAntrian">
        <div class="span7 well">
          <input type="hidden" id="no_rm" name="no_rm" value=''>
          <input type="hidden" id="validasi_reg" name="validasi_reg" value=''>
          <input type="hidden" id="id_pemeriksaan" name="id_pemeriksaan" value=''>
          <input type="hidden" id="idpemeriksaan" name="idpemeriksaan" value=''>
            <table>
              <tr>
                <td><label for="tanggal">Tgl</label></td>
                <td>
                  <input type="text" class="input-small" name="tanggal" id="tanggal" disabled value="<?php echo date('d-m-Y')?>">
                  <?php /*<div class="bfh-datepicker" data-format="d-m-y" data-date="">
                    <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                       <input type="text" class="input-small" name="tanggal" id="tanggal" readonly>
                       <button class="btn btn-small" type="button"><i class="icon-calendar"></i></button>
                    </div>
                    <div class="bfh-datepicker-calendar">
                      <table class="calendar table table-bordered">
                        <thead>
                          <tr class="months-header">
                            <th class="month" colspan="4">
                              <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                              <span></span>
                              <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                            </th>
                            <th class="year" colspan="3">
                              <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                              <span></span>
                              <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                            </th>
                          </tr>
                          <tr class="days-header">
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>*/?>
                </td>
                <td>&nbsp;</td>
                <td><label for="no_kk">No.KK</label></td>
                <td><input type="text" id="no_kk" name="no_kk" disabled></td>
              </tr>
              <tr>
                <td><label for="register">Reg</label></td>
                <td><div class="input-append">
                  <input type="text" class="input-small" readonly id="register" name="register" readonly>
                  <a class="btn btn-small" type="button" href="<?php echo site_url('poli/'.$this->uri->segment(2).'/antrian');?>" rel="facebox"><i class="icon-search"></i></a>
                  <span class="label label-important" id="counter_antrian"></span>
                </div></td>
                <td>&nbsp;</td>
                <td><label for="nama_kk">Nama KK</label></td>
                <td><input type="text" id="nama_kk" name="nama_kk" disabled></td>
              </tr>
              <tr>
                <td><label for="nik">Nik</label></td>
                <td><input type="text" id="nik" name="nik" disabled></td>
                <td>&nbsp;</td>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" id="alamat" name="alamat" disabled></td>
              </tr>
              <tr>
                <td><label for="nama_anggota">Nama</label></td>
                <td><input type="text" id="nama_anggota" name="nama_anggota" disabled></td>
                <td>&nbsp;</td>
                <td><label for="wilayah">Wilayah</label></td>
                <td><input type="text" id="wilayah" name="wilayah" disabled></td>
              </tr>
              <tr>
                <td><label for="umur">Umur</label></td>
                <td><input type="text" id="umur" name="umur" disabled>
                    <input type="hidden" id="umurtahun" name="umurtahun" autocomplete="off" disabled>
                </td>
                <td>&nbsp;</td>
                <td><label for="kunjungan">Kunjungan</label></td>
                <td><input type="text" id="kunjungan" name="kunjungan" disabled></td>
              </tr>
              <tr>
                <td><label for="status">Status Bayar</label></td>
                <td><input type="text" id="status" name="status" disabled></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </div>
        <div class="span3">
          <label class="antrian" for="nomor_antrian" id="nomor_antrian" name="nomor_antrian"></label>
        </div>

      </div><!--/row-->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
// $(function(){
//   jQuery(document).ready(function(){

//       // $('#rowFrmAntrian input[name="tanggal"]').val('<?php echo date("d-m-Y")?>');
//       // resetAntrian();

//   });
// });

    function resetAntrian(){
      var tgl=$('#rowFrmAntrian input[name="tanggal"]').val();
      $('#rowFrmAntrian input').val('');
      $('#rowFrmAntrian #nomor_antrian').html('');
      $('#rowFrmAntrian input[name="tanggal"]').val(tgl);
    }

</script>