    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Kelompok Tindakan</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKelompokTindakan" id="frmKelompokTindakan">
            <input type="hidden" id="id_kelompok" name="id_kelompok">
            <table>
              <tr>
                <td><label for="kode">Kelompok</label></td>
                <td><input type="text" name="nama_kelompok" id="nama_kelompok" value=""></td>
              </tr>
              <tr>
                <td><label for="nama">Klinik</label></td>
                <td><select id="klinik" name="klinik">
                    <option value="1">Anak</option>
                    <option value="2">IGD</option>
                    <option value="3">Dewasa</option>
                    <option value="4">Gizi</option>
                    <option value="5">Gigi</option>
                    <option value="6">Imunisasi</option>
                    <option value="7">Kebidanan</option>
                    <option value="8">KB</option>
                    <option value="10">Lansia</option>
          </select></td>
              </tr>
            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
        <button type="button" class="btn btn-small" id="btnReset" name="btnReset" onclick="resetlink()">Reset</button>
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Daftar Kelompok Tindakan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <table class="table dataTable" id="tblKelompokTindakan">
        <thead>
          <tr>
            <th>Kelompok</th>
            <th>Klinik</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
 </div>
 <!--/span9-->
 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
   

   function edit(){
    resetlink();
    if(kelicdData){
    $('#nama_kelompok').val(kelicdData.tindakan_kelompok);
    $('#id_kelompok').val(kelicdData.id_kelompok)
    $('#klinik').val(kelicdData.id_klinik)

    
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(kelicdData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_kelompok:kelicdData.id_kelompok};
     $.ajax({
            url: "<?php echo site_url('master/tindakan/hapuskelompok')?>",
            data: data,
            method:'post',
            dataType: 'json',

            success: function(obj){
              if(obj.success){
                oTable.fnDeleteRow(oTable.fnGetPosition(row));
                alert('data sudah dihapus');
                resetlink();
              }
            },
          });
kelicdData='';
    }
      }else{
      alert('Silahkan pilih salah satu data');
    }
   }

   $(document).on('click','#tblKelompokTindakan tr',function () 
  {
    kelicdData = oTable.fnGetData( this );
    $('#tblKelompokTindakan tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){

       oTable=$('#tblKelompokTindakan').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('master/tindakan/getListKelompok')?>",
        "aoColumns": [
              { "mData": "tindakan_kelompok" },
              { "mData": "nama_klinik" }
        ]
  });
      $('#frmKelompokTindakan').submit(function(){
        var err=false;
        if($('#nama_kelompok').val()==''||$('#kode_kelompok').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
               tindakan_kelompok:$('#nama_kelompok').val()
              ,id_kelompok:$('#id_kelompok').val()
              ,id_klinik:$('#klinik').val()
            };
          $.ajax({
            url: '<?php echo site_url('master/tindakan/simpankelompok')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                 alert('data sudah tersimpan');
                 oTable.fnClearTable();
                 oTable.fnDraw();
                 resetlink();
                 kelicdData ='';
              }else{
                alert('data kelompok sudah ada')
              }
            },
          });
        }
        return false;
      });

      resetlink();
  });
});

    function resetlink(){
      $('#frmKelompokTindakan input').val('');
      $('#frmKelompokTindakan select').val(1);
    }

   
    </script>
    