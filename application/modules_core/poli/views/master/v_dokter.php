    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Dokter</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmDokter" id="frmDokter">
            <input type="hidden" id="id_dokter" name="id_dokter">
            <table>
              <tr>
                <td><label for="nik">NIK</label></td>
                <td><input type="text" name="nik_dokter" id="nik_dokter" value=""></td>
              </tr>
              <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama_dokter" id="nama_dokter" value=""></td>
              </tr>
              <tr>
                <td><label for="tlp">Tlp</label></td>
                <td><input type="text" name="telp_dokter" id="telp_dokter" value=""></td>
              </tr>
              <tr>
                <td><label for="status">Status</label></td>
                <td>
                  <select id="status_dokter">
                    <option value="Tetap">Tetap</option>
                    <option value="Pengganti">Pengganti</option>
                  </select>
              </td>
              </tr>
            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Daftar Dokter</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <table class="table dataTable" id="tblDokter">
        <thead>
          <tr>
            <th>NIK</th>
            <th>Dokter</th>
            <th>Tlp</th>
            <th>Status</th>
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
    if(dokterData){
    $('#nama_dokter').val(dokterData.nama_dokter);
    $('#id_dokter').val(dokterData.nik_dokter);
    $('#nik_dokter').val(dokterData.nik_dokter);
    $('#telp_dokter').val(dokterData.telp_dokter);
    $('#status').val(dokterData.status_dokter);
    
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(dokterData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_dokter:dokterData.nik_dokter};
     $.ajax({
            url: "<?php echo site_url('poli/'.'master/dokter/hapusdokter')?>",
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
dokterData='';
    }
      }else{
      alert('Silahkan pilih salah satu data');
    }
   }

   $(document).on('click','#tblDokter tr',function () 
  {
    dokterData = oTable.fnGetData( this );
    $('#tblDokter tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){
       oTable=$('#tblDokter').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'master/dokter/getListDokter')?>",
        "aoColumns": [
              { "mData": "nik_dokter" }
             ,{ "mData": "nama_dokter" }
             ,{ "mData": "telp_dokter" }
             ,{ "mData": "status_dokter" }
        ]
  });
      $('#frmDokter').submit(function(){
        var err=false;
        if($('#frmDokter #nama_dokter').val()==''||$('#frmDokter #nik_dokter').val()==''||$('#frmDokter #nik_dokter').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
               id_dokter:$('#id_dokter').val()
              ,nama_dokter:$('#nama_dokter').val()
              ,nik_dokter:$('#nik_dokter').val()
              ,telp_dokter:$('#telp_dokter').val()
              ,status_dokter:$('#status_dokter').val()
              
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'master/dokter/simpanDokter')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                 alert('data sudah tersimpan');
                 oTable.fnClearTable();
                 oTable.fnDraw();
                 resetlink();
                 dokterData ='';
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
      $('#frmDokter input').val('');
    }

   
    </script>
    