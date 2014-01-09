    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Gizi Buruk</a>
          </li>
         
        </ul>
        <div class="span7">
          <form class="well" name="frmGiziBuruk">
            <table>
              <tr>
                <td><label for="time_kunjungan">Tgl</label></td>
                <td><div class="bfh-datepicker" data-format="d-m-y" data-date="22-01-2013">
                  <div class="input-append bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                     <input type="text" class="input-medium" readonly>
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
                </div>
              </td>
                <td>&nbsp;</td>
                <td><label for="no_kk">No.KK</label></td>
                <td><input type="text" id="no_kk" name="no_kk" disabled></td>
              </tr>
              <tr>
                <td><label for="register">Reg</label></td>
                <td><div class="input-append">
                  <input type="text" id="register" name="register" value='<?php //echo set_value('no_rm',$form[0]->no_rm); ?>'>
                  <a class="btn btn-small" type="button" href="<?php base_url();?>welcome/antrian" rel="facebox"><i class="icon-search"></i></a>
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
                <td><label for="nama_pasien">Nama</label></td>
                <td><input type="text" id="nama_pasien" name="nama_pasien" disabled></td>
                <td>&nbsp;</td>
                <td><label for="wilayah">Wilayah</label></td>
                <td><input type="text" id="wilayah" name="wilayah" disabled></td>
              </tr>
              <tr>
                <td><label for="umur">Umur</label></td>
                <td><input type="text" id="umur" name="umur" disabled></td>
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
              <tr>
                <td><label for="status">Tindak Lanjut</label></td>
                <td><input type="text" id="status" name="status" disabled></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><label for="status">Penyakit Penyerta</label></td>
                <td><input type="text" id="status" name="status" disabled></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <button class="btn btn-small">Simpan</button>
    <button class="btn btn-small">Reset</button>
       </div><!--/row-->

       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Riwayat Perawatan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <table class="table table-striped" id="tblRiwayatPerawatan">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    
  </form>
</div><!--/span9-->
</div><!--/row-->

</div><!--/.fluid-container-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
    $(function(){
      jQuery(document).ready(function() {
       jQuery('a[rel*=facebox]').facebox()
       $('#tblRiwayatKesehatan').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false
      } 
      );
       $('#tblRiwayatPerawatan').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false
      } );
     } );
      /*
      $(document).bind('close.facebox', function() {
        window.location = window.location + 'index2'
        window.location.reload()
      })*/ 
      $('li[data-target=#hero3]').click()

    })
    </script>
    