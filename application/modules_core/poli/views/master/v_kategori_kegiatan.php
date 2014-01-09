    <div class="span9"> <!-- content span -->
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#">Master Kategori Kegiatan</a>
          </li>
         </ul>
        <div class="span7">
          <form class="well" name="frmKegiatan" id="frmKegiatan">
            <input type="hidden" id="id_kategori" name="id_kategori">
            <table>
              <tr>
                <td><label for="kegiatan">Kategori</label></td>
                <td><input type="text" name="nama_kategori" id="nama_kategori" value=""></td>
              </tr>
            </table>
        <button class="btn btn-small" id="btnSimpan" name="btnSimpan">Simpan</button>
         </form>
        </div>
       </div><!--/row-->
       <div class="row"> <!--pemeriksaan-->
        <div class="labelhr">
          <span class="label">Daftar Kategori Kegiatan</span>
        </div>
        <div>
          <hr>
        </div>
      </div>
      <a class="btn btn-small" id="btnEdit" name="btnEdit" onclick="edit()">Edit</a>
      <a class="btn btn-small" id="btnHapus" name="btnHapus" onclick="hapus()">Hapus</a>
        <table class="table dataTable" id="tblKatKegiatan">
        <thead>
          <tr>
            <th>Kategori</th>
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
    if(mkatData){
    $('#nama_kategori').val(mkatData.nama_kategori);
    $('#id_kategori').val(mkatData.id_kategori)
    
    }else{
     alert('Silahkan pilih salah satu data');
    }
   }

   function hapus(){
    if(mkatData){
    if(confirm('Yakin akan menghapus?')){
    data={ id_kategori:mkatData.id_kategori};
     $.ajax({
            url: "<?php echo site_url('poli/'.'master/kegiatan/hapuskategori')?>",
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
mkatData='';
    }
      }else{
      alert('Silahkan pilih salah satu data');
    }
   }

   $(document).on('click','#tblKatKegiatan tr',function () 
  {
    mkatData = oTable.fnGetData( this );
    $('#tblKatKegiatan tr').each(function (){
      $(this).removeClass('DTTT_selected');
    });
    $(this).addClass('DTTT_selected');
    row = $(this).closest("tr").get(0);
  });


    $(function(){
  jQuery(document).ready(function(){
       oTable=$('#tblKatKegiatan').dataTable({
      "sRowSelect": "single",
       "sDom": "trtip",
      "bScrollCollapse": false, 
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo site_url('poli/'.'master/kegiatan/getListKategori')?>",
        "aoColumns": [
              { "mData": "nama_kategori" }
        ]
  });
      $('#frmKegiatan').submit(function(){
        var err=false;
        if($('#frmKegiatan #nama_kategori').val()=='') err=true;
        if(err){
          alert('Isian belum lengkap');
          return false;
        }else{
          data={
              id_kategori:$('#frmKegiatan #id_kategori').val()
              ,nama_kategori:$('#frmKegiatan #nama_kategori').val()
            };
          $.ajax({
            url: '<?php echo site_url('poli/'.'master/kegiatan/simpankategori')?>',
            data: data,
            method:'post',
            dataType: 'json',
            success: function(obj){
              if(obj.success){
                 alert('data sudah tersimpan');
                 oTable.fnClearTable();
                 oTable.fnDraw();
                 resetlink();
                 mkatData ='';
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
      $('#frmKegiatan input').val('');
    }

   
    </script>
    